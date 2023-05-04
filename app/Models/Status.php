<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = "status";
    protected $guarded = [];
    protected $hidden = [
        'id','info',
        'created_at',
        'updated_at'
    ];

    public function surat()
    {
        return $this->hasOne(Surat::class);
    }
}
