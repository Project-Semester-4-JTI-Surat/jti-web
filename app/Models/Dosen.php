<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dosen
 *
 * @property string $uuid
 * @property string $nip
 * @property string $nama
 * @property int $prodi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Prodi $prodi
 * @property-read \App\Models\Surat|null $surat
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereProdiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereUuid($value)
 * @mixin \Eloquent
 */
class Dosen extends Model
{
    use HasFactory,UUID;
    protected $primaryKey = 'uuid';
    protected $guarded = [];
    protected $table = 'dosen';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function surat()
    {
        return $this->hasOne(Surat::class);
    }
}
