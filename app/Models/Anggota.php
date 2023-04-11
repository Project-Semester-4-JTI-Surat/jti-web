<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $guarded = [];
    protected $table = 'anggota';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
