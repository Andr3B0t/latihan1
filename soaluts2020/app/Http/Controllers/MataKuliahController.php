<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataKuliah::all();

        // dd($queryModel);

        return view('matakuliah.index', compact('data'));
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

    public function showInfoA()
    {
        $data = MataKuliah::join('ambil_mk as a', 'matakuliahs.id', '=', 'a.matakuliah_id')
        ->select('matakuliahs.kode_MK', 'matakuliahs.nama_MK', DB::raw('count(a.matakuliah_id) as jumpes'))
        ->groupBy('matakuliahs.kode_MK', 'matakuliahs.nama_MK')
        ->orderBy('jumpes','DESC')
        ->first();

        //dd($data);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
            Kode MK: ". $data->kode_MK.", Nama MK: ".$data->price.", Jumlah Peserta: ".$data->jumpes."</div>"
        ),200);
    }
}
