<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Anggota
 *
 * @property string $surat_id
 * @property string|null $nim
 * @property string $ketua kolom untuk menentukan apakah anggota tersebut ketua dalam kelompok atau tidak
 * @property string $individu kolom untuk menentukan apakah mahasiswa tersebut berkelompok atau individu
 * @property int $prodi_id
 * @property string|null $nama
 * @property string|null $no_hp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Prodi $prodi
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Surat> $surat
 * @property-read int|null $surat_count
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereIndividu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKetua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereProdiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereSuratId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
}
