<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;
use PDF;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = DB::table('pemesanans');
        $pemesanan = Pemesanan::all();
        return view('/administrator/verifikasi', ['pemesanan' => $pemesanan]);
    }

    public function cetakpdf(){
        $pemesanan = Pemesanan::all();

        $pdf = PDF::loadview('administrator/pemesanan_pdf',['pemesanan' =>$pemesanan]);
        return $pdf->stream();
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
    public function store(Request $request)
    {
        //
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
        Pemesanan::where('id_pemesanan', $id)->update(['status' => 1]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pemesanan::where('id_pemesanan', $id)->delete();
        return back();
    }
}