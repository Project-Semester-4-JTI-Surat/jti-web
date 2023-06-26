<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JenisSurat
 *
 * @property string $kode
 * @property string|null $keterangan
 * @property string $template
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Koordinator|null $koordinator
 * @property-read \App\Models\Surat|null $surat
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSurat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
