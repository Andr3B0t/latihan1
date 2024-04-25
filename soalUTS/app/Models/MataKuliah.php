<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataKuliah extends Model
{
    protected $table = 'matakuliahs';

    /**
     * The roles that belong to the Mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function matakuliahs(): BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class, 'ambil_mk', 'matakuliah_id', 'mahasiswa_id');
    }
}
