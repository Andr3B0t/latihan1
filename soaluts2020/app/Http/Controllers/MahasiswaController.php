<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::all();

        // dd($queryModel);

        return view('mahasiswa.index', compact('data'));
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

    public function showInfoC()
    {
        $data = Mahasiswa::leftJoin('ambil_mk as a', 'mahasiswas.id', '=', 'a.mahasiswa_id')
        ->select('mahasiswas.nrp')
        ->where('a.mahasiswa_id', null)
        ->get();

        $output = "";

        foreach($data as $d){
            $output .= $d->nrp.', ';
        }

        //dd($data);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
            NRP Mahasiswa belum pernah mengambil MK: ".$output."</div>"
        ),200);
    }

    public function showInfoD()
    {
        $data = Mahasiswa::leftJoin('ambil_mk as a', 'mahasiswas.id', '=', 'a.mahasiswa_id')
        ->select('mahasiswas.nrp', 'mahasiswas.nama', DB::raw('SUM(matakuliahs.sks) as total_sks'))
        ->leftJoin('matakuliahs', 'a.matakuliah_id', '=', 'matakuliahs.id')
        ->groupBy('mahasiswas.nrp', 'mahasiswas.nama')
        ->orderByDesc('total_sks')
        ->first();

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
             NRP: ".$data->nrp." dan Nama: ".$data->nama." adalah mahasiswa yang mengambil MK terbanyak</div>"
        ),200);
    }
}
