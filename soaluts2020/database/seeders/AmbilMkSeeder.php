<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AmbilMkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ambil_mk')->insert([
            ['mahasiswa_id'=>1,
            'matakuliah_id'=>1,
            'fppke'=>1],

            ['mahasiswa_id'=>1,
            'matakuliah_id'=>2,
            'fppke'=>1],

            ['mahasiswa_id'=>2,
            'matakuliah_id'=>3,
            'fppke'=>2],

            ['mahasiswa_id'=>3,
            'matakuliah_id'=>4,
            'fppke'=>3],

            ['mahasiswa_id'=>4,
            'matakuliah_id'=>5,
            'fppke'=>1],
        ]);
    }
}
