<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Rute;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::orderby('id_pemesanan', 'ASC')->get();
        return view('administrator.pemesanan',['pemesanan'=> $pemesanan, 'penumpang'=>Penumpang::all(), 'rute'=>Rute::all(), 'petugas'=>Petugas::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemesanan = Pemesanan::data();
        return view('/pemesanan/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penumpang = Penumpang::where('nama_penumpang', $request->nama_penumpang)->first();
        $rute = Rute::where('rute_awal', $request->rute_awal)->first();
        $petugas = Petugas::where('nama_petugas', $request->nama_petugas)->first();
        $pemesanan =[
            'id_pemesanan' => $request->input('id_pemesanan'),
            'kode_pemesanan' => rand(100000,999999),
            'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
            'tempat_pemesanan' => $request->input('tempat_pemesanan'),
            'id_penumpang' => $request->input('id_penumpang'),
            'kode_kursi' => $request->input('kode_kursi'),
            'id_rute' => $request->input('id_rute'),
            'tujuan' => $request->input('tujuan'),
            'tanggal_berangkat' => $request->input('tanggal_berangkat'),
            'jam_cekin' => $request->input('jam_cekin'),
            'jam_berangkat' => $request->input('jam_berangkat'),
            'total_bayar' => $request->input('total_bayar'),
            'id_petugas' => $request->input('id_petugas'),
        ];
        Pemesanan::create($pemesanan);
        return redirect('/pemesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = Petugas::where('id_petugas', $request->id_petugas)->first();
        $penumpang = Penumpang::where('id_penumpang', $request->id_penumpang)->first();
        $pemesanan =[
            'id_pemesanan' => $request->input('id_pemesanan'),
            'kode_pemesanan' => $request->input('kode_pemesanan'),
            'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
            'tempat_pemesanan' => $request->input('tempat_pemesanan'),
            'id_penumpang' => $request->input('id_penumpang'),
            'kode_kursi' => $request->input('kode_kursi'),
            'id_rute' => $request->input('id_rute'),
            'tujuan' => $request->input('tujuan'),
            'tanggal_berangkat' => $request->input('tanggal_berangkat'),
            'jam_cekin' => $request->input('jam_cekin'),
            'jam_berangkat' => $request->input('jam_berangkat'),
            'total_bayar' => $request->input('total_bayar'),
            'id_petugas' => $request->input('id_petugas'),
        ];
        Pemesanan::where('id_pemesanan', $id)->update($pemesanan);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pemesanan::where('id_pemesanan', $id)->delete();
        return redirect('/pemesanan');
    }
}