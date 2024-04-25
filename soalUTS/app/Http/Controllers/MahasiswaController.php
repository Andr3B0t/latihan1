<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryModel = Mahasiswa::all();
        // dd($queryModel);
        return view('mahasiswa.index', compact('queryModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function showMataKuliahs()
    {
        $data = DB::table('matakuliahs')
        ->select('matakuliahs.*')
        ->join('ambil_mk','ambil_mk.matakuliah_id','=','matakuliahs.id')
        ->join('mahasiswas','mahasiswas.id','=','ambil_mk.mahasiswa_id')
        ->where('mahasiswas.id','=',$_POST['mahasiswa_id'])
        ->get();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('mahasiswa.showMataKuliahs',compact('data'))->render()
        ),200);
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
