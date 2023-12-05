<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penumpang = Penumpang::data();
        return view('/administrator/penumpang', ['datapenumpang' => $penumpang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penumpang = Penumpang::data();
        return view('/administrator/index');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penumpang =[
            'id_penumpang' => $request->input('id_penumpang'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->password),
            'nama_penumpang' => $request->input('nama_penumpang'),
            'alamat_penumpang' => $request->input('alamat_penumpang'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'telfon' => $request->input('telfon')
        ];
        Penumpang::create($penumpang);
        return redirect('/login');
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
        $penumpang =[
            'id_penumpang' => $request->input('id_penumpang'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'nama_penumpang' => $request->input('nama_penumpang'),
            'alamat_penumpang' => $request->input('alamat_penumpang'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'telfon' => $request->input('telfon')
        ];
        Penumpang::where('id_petugas', $id)->update($penumpang);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penumpang::where('id_penumpang', $id)->delete();
        return redirect('/penumpang');
    }
}
