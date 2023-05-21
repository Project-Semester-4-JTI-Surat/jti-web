<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory, UUID;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $guarded = [];
    protected $table = 'surat';
    protected $hidden = [
        'dosen_id',
        'status_id',
        'kode_koordinator',
        'created_at',
        'updated_at'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_id');
    }
    public function jenis_surat()
    {
        return $this->belongsTo(JenisSurat::class,'kode_surat');
    }

    public function koordinator()
    {
        return $this->belongsTo(Koordinator::class,'kode_koordinator');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class,'surat_id');
    }
}
