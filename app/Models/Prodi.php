<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = "prodi";
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function koordinator()
    {
        return $this->hasOne(Koordinator::class);
    }
}
