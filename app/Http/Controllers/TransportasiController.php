<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use App\Models\Type_Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportasi = Transportasi::all();
        return view('/administrator/transportasi', ['datatransportasi' => $transportasi, 'typetransportasi'=>Type_Transportasi::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $transportasi = Transportasi::all();
       return view('/transportasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = Type_Transportasi::where('nama_type', $request->nama_type)->first();

        $transportasi =[
            //'id_transportasi' => $request->input('id_transportasi'),
            'kode' => rand(100000,999999),
            'jumlah_kursi' => $request->input('jumlah_kursi'),
            'keterangan' => $request->input('keterangan'),  
            'id_type_transportasi' => $request->id_type_transportasi,
        ];
        Transportasi::create($transportasi);
        return redirect('/transportasi');
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
        $transportasi = Transportasi::where('id_transportasi', $id)->first();
        return view('/transportasi');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transportasi =[
            //'id_transportasi' => $request->input('id_transportasi'),
            'kode' => rand(100000,999999),
            'jumlah_kursi' => $request->input('jumlah_kursi'),
            'keterangan' => $request->input('keterangan'),
            'id_type_transportasi' => $request->input('id_type_transportasi'),
        ];
        Transportasi::where('id_transportasi', $id)->update($transportasi);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transportasi::where('id_transportasi', $id)->delete();
        return back();
    }
}
