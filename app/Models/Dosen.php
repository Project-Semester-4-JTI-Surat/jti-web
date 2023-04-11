<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
