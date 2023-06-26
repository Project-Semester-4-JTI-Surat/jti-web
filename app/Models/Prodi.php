<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Prodi
 *
 * @property int $id
 * @property string|null $keterangan
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AdminProdi> $admin_prodi
 * @property-read int|null $admin_prodi_count
 * @property-read \App\Models\Anggota|null $anggota
 * @property-read \App\Models\Dosen|null $dosen
 * @property-read \App\Models\Koordinator|null $koordinator
 * @property-read \App\Models\Mahasiswa|null $mahasiswa
 * @property-read \App\Models\Surat|null $surat
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prodi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prodi extends Model
{
    use HasFactory;
    protected $table = "prodi";
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function koordinator()
    {
        return $this->hasOne(Koordinator::class);
    }

    public function surat()
    {
        return $this->hasOne(Surat::class);
    }

    public function admin_prodi()
    {
        return $this->hasMany(AdminProdi::class);
    }
}
