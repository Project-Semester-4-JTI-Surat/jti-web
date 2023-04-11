<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\Mahasiswa\AuthController as MahasiswaAuth;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\KoordinatorController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\ManagementUserController;
use App\Mail\Verification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login_process', [AuthController::class, 'login_process'])->name('login_process');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'dosen', 'as' => 'dosen.'], function () {
        Route::get('/', [DosenController::class, 'index'])->name('index');
        Route::post('insert',[DosenController::class, 'insert'])->name('insert');
    });

    Route::group(['prefix' => 'koordinator', 'as' => 'koordinator.'], function () {
        Route::get('/', [KoordinatorController::class, 'index'])->name('index');
        Route::post('insert',[KoordinatorController::class, 'insert'])->name('insert');
    });

    Route::group(['prefix'=>'surat','as'=>'surat.'],function(){
       Route::get('/{id}',[SuratController::class, 'getSurat'])->name('index'); 
    });
    
    Route::group(['prefix' => 'prodi', 'as' => 'prodi.'], function () {
        Route::get('/', [ProdiController::class, 'index'])->name('index');
    });

    Route::group(['prefix'=>'jenis_surat','as'=>'jenis_surat.'],function(){
        Route::get('/',[SuratController::class, 'getJenisSurat'])->name('index');
        Route::post('insert',[SuratController::class, 'insertJenisSurat'])->name('insertJenisSurat');
    });

    Route::get('pengaturan',[AdminController::class, 'pengaturanAkun'])->name('pengaturan_akun');
    Route::post('update/akun',[AdminController::class, 'updateAkun'])->name('updateAkun');

    Route::group(['prefix' => 'data-admin', 'as' => 'data-admin.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('insert', [AdminController::class, 'insert'])->middleware('RoleCheck:Super Admin')->name('insert');
    });
});

Route::resource('user', ManagementUserController::class); //otomatis mengambil nama function dan menyesuaikan http requestnya
Route::get('home', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'data','middleware'=>MahasiswaApiCheck::class],function(){
    Route::get('dosen',[DataController::class, 'dosen']);
});
