<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use DB;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryModel = MataKuliah::all();
        return view('matakuliah.index', compact('queryModel'));
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

    public function showMahasiswas()
    {
        $data = DB::table('matakuliahs')
        ->select('mahasiswas.*')
        ->join('ambil_mk','ambil_mk.matakuliah_id','=','matakuliahs.id')
        ->join('mahasiswas','mahasiswas.id','=','ambil_mk.mahasiswa_id')
        ->where('matakuliahs.id','=',$_POST['mahasiswa_id'])
        ->get();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('matakuliah.showMahasiswas',compact('data'))->render()
        ),200);
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
