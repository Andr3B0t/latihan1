<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    public function matakuliahs(): BelongsToMany
    {
        return $this->belongsToMany(MataKuliah::class, 'ambil_mk', 'mahasiswa_id', 'matakuliah_id');
    }
}
