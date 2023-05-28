<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JenisSurat;
use App\Models\Koordinator;
use App\Models\Prodi;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    use ApiResponse;
    /**
     * @param string $message
     * @param Collection $collection
     * 
     * @return JsonResponse
     */
    protected function baseResponseData($message = 'Data' ,Collection $collection) : JsonResponse
    {
        return $this->successResponseData($message,$collection);
    }

    /**
     * @return JsonResponse
     */
    public function dosen() : JsonResponse
    {
        $auth = Auth::user();
        return $this->baseResponseData('Data Dosen',Dosen::where('nip','!=','-')->where('prodi_id','=',$auth->prodi_id)->get());
    }

    /**
     * @return JsonResponse
     */
    public function koordinator() : JsonResponse
    {
        $auth = Auth::user();
        return $this->baseResponseData('Data Koordinator',Koordinator::where('nama','!=','-')->where('prodi_id','=',$auth->prodi_id)->get());
    }

    /**
     * @return JsonResponse
     */
    public function prodi() : JsonResponse
    {
        return $this->baseResponseData('Data Prodi',Prodi::where('id','!=','2')->get());
    }

    /**
     * @return JsonResponse
     */
    public function JenisSurat() : JsonResponse
    {
        return $this->baseResponseData('Data Jenis Surat',JenisSurat::where('keterangan','!=','-')->get());
    }


}
