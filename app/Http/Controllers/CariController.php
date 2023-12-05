<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Rute;
use App\Models\Transportasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rute = Rute::where('rute_awal',$request->rute_awal)->where('rute_akhir',$request->rute_akhir)
        ->get(); 
        // dd($rute);
        $trans = Transportasi::all();
        return view('user.tiket', [
            'tran'=>$rute,
            'penumpang'=>Penumpang::all(),
            'rute'=>Rute::all(),
            'petugas'=>Petugas::all()
        ]);  
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
