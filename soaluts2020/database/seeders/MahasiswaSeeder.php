<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            ['nrp'=>'160417991',
            'nama'=>'Rudi',
            'ipk'=>3.92,
            'ips'=>4,
            'semester'=>7,
            'created_at'=>null,
            'updated_at'=>null],

            ['nrp'=>'160417992',
            'nama'=>'Tabita',
            'ipk'=>3.2,
            'ips'=>3.75,
            'semester'=>7,
            'created_at'=>null,
            'updated_at'=>null],

            ['nrp'=>'160418993',
            'nama'=>'Karina',
            'ipk'=>3.64,
            'ips'=>3.95,
            'semester'=>5,
            'created_at'=>null,
            'updated_at'=>null],

            ['nrp'=>'160418994',
            'nama'=>'Lukito',
            'ipk'=>2.65,
            'ips'=>3.3,
            'semester'=>5,
            'created_at'=>null,
            'updated_at'=>null],

            ['nrp'=>'6138198',
            'nama'=>'SIMON',
            'ipk'=>2.76,
            'ips'=>2.89,
            'semester'=>11,
            'created_at'=>null,
            'updated_at'=>null],
        ]);
    }
}
