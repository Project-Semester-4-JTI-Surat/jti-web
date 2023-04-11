<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory, UUID;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $guarded = [];
    protected $table = 'surat';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
