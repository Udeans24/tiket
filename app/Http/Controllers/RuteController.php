<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Transportasi;
use Illuminate\Http\Request;
use Whoops\Run;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = Rute::all();
        return view('/administrator/rute', ['rute' => $rute, 'transportasi'=>Transportasi::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = Rute::all();
        return view('/rute');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transportasi = Transportasi::where('keterangan', $request->keterangan)->first();
        $rute =[
            'id_rute' => $request->input('id_rute'),
            'tujuan' => $request->input('tujuan'),
            'rute_awal' => $request->input('rute_awal'),
            'rute_akhir' => $request->input('rute_akhir'),
            'jamberangkat'=>$request->input('jamberangkat'),
            'harga' => $request->input('harga'),
            'id_transportasi' => $request->input('id_transportasi'),
        ];
        Rute::create($rute);
        return redirect('/rute');
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
        $rute = Rute::where('id_rute', $id)->get();
        return view('/rute')->with('rute', $rute);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rute =[
            // 'id_rute' => $request->input('id_rute'),
            'tujuan' => $request->input('tujuan'),
            'rute_awal' => $request->input('rute_awal'),
            'rute_akhir' => $request->input('rute_akhir'),
            'jamberangkat'=>$request->input('jamberangkat'),
            'harga' => $request->input('harga'),
            'id_transportasi' => $request->input('id_transportasi'),
        ];
        Rute::where('id_rute', $id)->update($rute);
        return redirect('/rute');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rute::where('id_rute', $id)->delete();
        return back();
    }
}