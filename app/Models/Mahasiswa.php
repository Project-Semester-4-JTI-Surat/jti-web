<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\Mahasiswa
 *
 * @property string $uuid
 * @property string $nim
 * @property string $nama
 * @property string $email
 * @property int $prodi_id
 * @property string $password
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $tanggal_lahir
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Prodi $prodi
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereProdiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereUuid($value)
 * @mixin \Eloquent
 */
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
