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
        return $this->baseResponseData('Data Dosen',Dosen::all());
    }

    /**
     * @return JsonResponse
     */
    public function koordinator() : JsonResponse
    {
        return $this->baseResponseData('Data Dosen',Koordinator::all());
    }

    /**
     * @return JsonResponse
     */
    public function prodi() : JsonResponse
    {
        return $this->baseResponseData('Data Dosen',Prodi::where('id','!=','2')->get());
    }

    /**
     * @return JsonResponse
     */
    public function JenisSurat() : JsonResponse
    {
        return $this->baseResponseData('Data Dosen',JenisSurat::all());
    }


}
