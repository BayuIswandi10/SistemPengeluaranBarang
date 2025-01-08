<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_approval', function (Blueprint $table) {
            $table->unsignedBigInteger('approval_id')->autoIncrement();
            $table->unsignedBigInteger('pengeluaran_barang_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('status_approval');

            $table->foreign('pengeluaran_barang_id')->references('pengeluaran_barang_id')->on('tb_pengeluaran_barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')->references('nrp_karyawan')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_approval');
    }
};
