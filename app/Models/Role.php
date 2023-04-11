<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "role";
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
