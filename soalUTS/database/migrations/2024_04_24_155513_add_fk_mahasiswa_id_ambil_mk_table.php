<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ambil_mk', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('matakuliah_id');

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ambil_mk', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
            $table->dropForeign(['matakuliah_id']);

            $table->dropColumn(['mahasiswa_id']);
            $table->dropColumn(['matakuliah_id']);
        });
    }
};
