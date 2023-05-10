<?php

namespace App\Http\Controllers\Api\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class DetailSurat extends Controller
{
    public function index($id)
    {
        Surat::find($id);
        retur
    }
}
