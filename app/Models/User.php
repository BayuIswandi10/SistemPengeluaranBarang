<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'nrp_karyawan';
    protected $table = 'tb_user';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'password',
        'seksi',
        'departement',
        'level',
    ];

    public function pengeluaranBarang()
    {
        return $this->hasMany(PengeluaranBarang::class, 'created_by', 'nrp_karyawan');
    }

    public function approval()
    {
        return $this->hasMany(Approval::class, 'created_by', 'nrp_karyawan');
    }
}

