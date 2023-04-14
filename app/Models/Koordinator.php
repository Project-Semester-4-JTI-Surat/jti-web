<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory,UUID;
    protected $table = "koordinator";
    protected $guarded = [];
    protected $primaryKey = 'uuid';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function jenis_surat()
    {
        return $this->belongsTo(JenisSurat::class,'kode_surat');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function surat()
    {
        return $this->hasOne(Surat::class);
    }
}
