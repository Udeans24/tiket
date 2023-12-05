<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }
    public function proces(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'nama_penumpang' => ['required'],
            'alamat_penumpang' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'telefon' => ['required'],
        ]);
        $penumpang = new Penumpang([
            'username' =>$request->username,
            'password' => Hash::make($request->password),
            'nama_penumpang' => $request->nama_penumpang,
            'alamat_penumpang' => $request->alamat_penumpang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telefon' => $request->telefon,
        ]);
        

        $penumpang->save();
        return redirect('/login')->with('succes');
    }
}