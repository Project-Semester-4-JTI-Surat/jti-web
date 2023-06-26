<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Koordinator
 *
 * @property string $uuid
 * @property string $nama
 * @property string|null $no_hp
 * @property string $kode_surat
 * @property string|null $email
 * @property int $prodi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\JenisSurat $jenis_surat
 * @property-read \App\Models\Prodi $prodi
 * @property-read \App\Models\Surat|null $surat
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereKodeSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereProdiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koordinator whereUuid($value)
 * @mixin \Eloquent
 */
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
