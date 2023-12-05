<?php

namespace App\Http\Controllers;

use App\Models\Type_Transportasi;
use Illuminate\Http\Request;

class Type_TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_transportasi = Type_Transportasi::all();
        return view('/administrator/typetransportasi', ['datatype_transportasi' => $type_transportasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        
    {
        $type_transportasi = Type_Transportasi::data();
        return view('/typetransportasi');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type_transportasi =[
            // 'id_type_transportasi' => $request->input('id_type_transportasi'),
            'nama_type' => $request->input('nama_type'),
            'keterangan' => $request->input('keterangan')
        ];
        Type_Transportasi::create($type_transportasi);
        return redirect('/typetransportasi');
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
        $type_transportasi= Type_Transportasi::where('id_type_transportasi', $id)->first();
        return view('/typetransportasi')->with('datatypetransportasi', $type_transportasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type_transportasi =[
            // 'id_type_transportasi' => $request->input('id_type_transportasi'),
            'nama_type' => $request->input('nama_type'),
            'keterangan' => $request->input('keterangan')
        ];
        Type_Transportasi::where('id_type_transportasi', $id)->update($type_transportasi);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Type_Transportasi::where('id_type_transportasi', $id)->delete();
        return redirect('/typetransportasi')->with('succes', 'Berhasil Melakukan Delete');
    }
}
