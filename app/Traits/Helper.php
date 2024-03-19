<?php

namespace App\Traits;

use App\Models\AdminProdi;
use Auth;

trait Helper {
    function getProdiUserLogin() {
        $auth = Auth::guard('admin')->user();
        $admin_prodi = AdminProdi::with(['prodi'])->where('admin_id','=',$auth->uuid)->get();
        return $admin_prodi;
    }
}