<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliahs')->insert([
            ['kode_MK'=>'1604A053',
            'nama_MK'=>'WFP',
            'sks'=>2,
            'semester'=>5,
            'created_at'=>null,
            'updated_at'=>null],

            ['kode_MK'=>'1604B043',
            'nama_MK'=>'Web Programming',
            'sks'=>3,
            'semester'=>3,
            'created_at'=>null,
            'updated_at'=>null],

            ['kode_MK'=>'1604A033',
            'nama_MK'=>'Desain Web',
            'sks'=>2,
            'semester'=>3,
            'created_at'=>null,
            'updated_at'=>null],

            ['kode_MK'=>'1604B054',
            'nama_MK'=>'Hybrid Mobile Programming',
            'sks'=>3,
            'semester'=>7,
            'created_at'=>null,
            'updated_at'=>null],

            ['kode_MK'=>'1604B052',
            'nama_MK'=>'Native Mobile Programming',
            'sks'=>3,
            'semester'=>5,
            'created_at'=>null,
            'updated_at'=>null],
        ]);
    }
}
