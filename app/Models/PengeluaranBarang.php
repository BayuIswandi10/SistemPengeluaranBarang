<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranBarang extends Model
{
    use HasFactory;

    protected $primaryKey = 'pengeluaran_barang_id';
    protected $table = 'tb_pengeluaran_barang';
    public $timestamps = false;

    protected $fillable = [
        'created_by',
        'created_date',
        'tujuan_pengeluaran_barang',
        'jenis_kendaraan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'nrp_karyawan');
    }

    public function approval()
    {
        return $this->hasMany(Approval::class, 'pengeluaran_barang_id', 'pengeluaran_barang_id');
    }

    public function barangKeluar()
    {
        return $this->belongsToMany(BarangKeluar::class, 'tb_detail_pengeluaran', 'pengeluaran_barang_id', 'barang_keluar_id');
    }
}

