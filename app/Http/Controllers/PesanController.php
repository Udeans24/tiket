<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Rute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        $penumpang = Penumpang::all();
        $rute = Rute::all();
        $petugas = Petugas::all();
        return view('/pesan', ['dtpemesanan' => $pemesanan, 'penumpang'=>Penumpang::all()], compact('penumpang','rute','petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function calculatePrice($costPrice, $profitMargin)
    {
    $price = $costPrice + ($costPrice * ($profitMargin / 100));
    return $price;
    }

    public function store(Request $request)
    {
        
        $seat = new Pemesanan();
        $seat = $this->generateSeatNumber(); // Fungsi untuk menghasilkan nomor kursi secara otomatis
        $pesan = new Pemesanan();
        $pesan = $this->generateNumber(); // Fungsi untuk menghasilkan nomor kursi secara otomatis
        $penumpang = Penumpang::where('nama_penumpang', $request->nama_penumpang)->first();
        $rute = Rute::where('rute_awal', $request->rute_awal)->first();
        $petugas = Petugas::where('nama_petugas', $request->nama_petugas)->first();
        $pemesanan =[
            // 'id_pemesanan' => $request->input('id_pemesanan'),
            'kode_pemesanan' => $pesan,
            'tanggal_pemesanan' =>Carbon::now(),
            'tempat_pemesanan' => $request->input('tempat_pemesanan'),
            'id_penumpang' => $request->id_penumpang,
            'kode_kursi' => $seat,
            'id_rute' => $request->id_rute,
            'tujuan'=>$request->tujuan,
            'tanggal_berangkat' => $request->input('tanggal_berangkat'),
            'jam_cekin' => $request->input('jam_cekin'),
            'jam_berangkat' => $request->input('jam_berangkat'),
            'total_bayar' => $request->input('total_bayar'),
            'id_petugas' => $request->id_petugas,
        ];
        Pemesanan::create($pemesanan);
        return redirect('home');
    }
    private function generateSeatNumber()
    {
        // Logika untuk menghasilkan nomor kursi secara otomatis
        // Misalnya, Anda bisa menggunakan kombinasi huruf dan angka acak
        return 'K-'.rand(01, 30);
    }
    private function generateNumber()
    {
        // Logika untuk menghasilkan nomor kursi secara otomatis
        // Misalnya, Anda bisa menggunakan kombinasi huruf dan angka acak
        return 'KD-'.rand(100, 999);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       //
    }
}