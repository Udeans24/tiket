<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
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
        $user =[
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'penumpang',
        ];
       $saveuser = new User;
       $saveuser->name=$user['name'];
       $saveuser->email=$user['email'];
       $saveuser->password=$user['password'];
       $saveuser->role=$user['role'];
       $saveuser->save();

        $penumpang =[
            'id_penumpang' => $request->input('id_penumpang'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->password),
            'nama_penumpang' => $request->input('nama_penumpang'),
            'alamat_penumpang' => $request->input('alamat_penumpang'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'telfon' => $request->input('telfon'),
            'id_user' => $saveuser->id
        ];
        Penumpang::create($penumpang);
        $this->login($request);
        return redirect('/');
    }


    private function login($request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            } elseif (Auth::user()->role == 'penumpang'){
                return redirect('home');
            }
        }else{
            return  redirect('/')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
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
