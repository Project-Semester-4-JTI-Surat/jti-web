<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;
    protected $table = "jenis_surat";
    protected $primaryKey = 'kode';
    protected $guarded = [];
    protected $keyType = 'string';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function koordinator()
    {
        return $this->hasOne(Koordinator::class);
    }
    public function surat()
    {
        return $this->hasOne(Surat::class);
    }
}
