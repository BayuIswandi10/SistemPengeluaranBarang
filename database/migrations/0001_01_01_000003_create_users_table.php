<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->unsignedBigInteger('nrp_karyawan')->primary();
            $table->string('nama');
            $table->string('seksi');
            $table->string('departement');
            $table->string('level');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
