<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('/administrator/petugas', ['datapetugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = Petugas::data();
        return view('/administrator/petugas');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hashedPass = Hash::make($request->input('password'));
        $petugas =[
            'id_petugas' => $request->input('id_petugas'),
            'username' => $request->input('username'),
            'password' => $hashedPass,
            'nama_petugas' => $request->input('nama_petugas'),
            'id_level'=> $request->input('id_level'),
        ];
        Petugas::create($petugas);
        return redirect('/petugas');
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
        $petugas = Petugas::where('id_petugas', $id)->first();
        return view('/petugas')->with('datapetugas', $petugas);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas =[
            'id_petugas' => $request->input('id_petugas'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'nama_petugas' => $request->input('nama_petugas'),
            'id_level' => $request->input('id_level'),
        ];
        Petugas::where('id_petugas', $id)->update($petugas);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Petugas::where('id_petugas', $id)->delete();
        return redirect('/petugas')->with('succes', 'Berhasil Melakukan Delete');
    }

}
