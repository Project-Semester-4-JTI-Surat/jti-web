<?php

use App\Http\Controllers\Api\Mahasiswa\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\SuratController;
use App\Http\Middleware\MahasiswaApiCheck;
use App\Mail\Verification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'mahasiswa'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('reset_password', [AuthController::class, 'reset_password']);
    Route::post('save_password/{id}',[AuthController::class, 'save_password'])->name('save_password');
    Route::get('logout',[AuthController::class,'logout'])->middleware(MahasiswaApiCheck::class);

    Route::group(['middleware'=>MahasiswaApiCheck::class], function () {
        Route::get('/',[AuthController::class,'check']);
        Route::post('surat/insert',[SuratController::class,'insert']);
    });

    

    
});
Route::group(['prefix'=>'data'],function(){
    Route::get('dosen',[DataController::class, 'dosen']);
    Route::get('koordinator',[DataController::class, 'koordinator']);
    Route::get('prodi',[DataController::class, 'prodi']);
    Route::get('jenis_surat',[DataController::class, 'JenisSurat']);
});

Route::get('faq/',[FAQController::class, 'index_api']);
