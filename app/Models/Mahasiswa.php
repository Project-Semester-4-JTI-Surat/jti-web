<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Mahasiswa extends Authenticatable implements JWTSubject
{
    use HasFactory, UUID;
    protected $table = "mahasiswa";
    protected $guarded = [];
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $with = ['prodi'];
    protected $hidden = [
        'password',
        'prodi_id',
        'created_at',
        'updated_at'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    // Otomatis enkripsi password sebelum disimpan di database
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value),
        );
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
