<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\KoordinatorController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\FileUploadTempController;
use App\Http\Controllers\MahasiswaAuthController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\SuratController as MahasiswaSuratController;
use App\Http\Middleware\MahasiswaAuth;
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
        Route::get('reset_password/{id}',[MahasiswaController::class, 'reset_password'])->name('reset_password');
        Route::get('delete/{id}',[MahasiswaController::class, 'hapus'])->name('hapus');
    });

    Route::group(['prefix'=>'rekap','as'=>'rekap.'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\RekapController::class, 'index'])->name('index');
        Route::post('/export',[\App\Http\Controllers\Admin\RekapController::class,'export'])->name('export');
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
       Route::get('/',[SuratController::class, 'getSurat'])->name('index');
       Route::get('/detail/{id?}',[SuratController::class, 'detail'])->name('detail');
       Route::get('proses_surat/{id}',[SuratController::class, 'proses_surat'])->name('proses_surat');
       Route::get('dapat_diambil/{id}',[SuratController::class, 'dapat_diambil'])->name('dapat_diambil');
       Route::get('surat_selesai/{id}',[SuratController::class, 'surat_selesai'])->name('surat_selesai');
       Route::post('softfile/save/{id}',[SuratController::class,'softfile_save'])->name('softfile_save');
       Route::post('tolak/{id}',[SuratController::class, 'tolak_surat'])->name('tolak_surat');
       Route::get('print/{id}',[SuratController::class, 'print'])->name('print');
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
        Route::post('update/{id}',[AdminController::class, 'update'])->name('update');
        Route::get('/edit/{id}',[AdminController::class, 'edit'])->name('edit');
        Route::post('insert', [AdminController::class, 'insert'])->middleware('RoleCheck:Super Admin')->name('insert');
    });
});

Route::group(['prefix'=>'mahasiswa','as'=>'mahasiswa.'],function(){
    Route::get('login',[MahasiswaAuthController::class, 'index'])->name('login');
    Route::get('register',[MahasiswaAuthController::class, 'register'])->name('register');
    Route::post('register_process',[MahasiswaAuthController::class, 'register_process'])->name('register_process');
    Route::post('login_process',[MahasiswaAuthController::class, 'login_process'])->name('login_process');

    Route::group(['middleware'=>MahasiswaAuth::class],function(){
        Route::get('dashboard/',[MahasiswaAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('profile/',[MahasiswaAuthController::class, 'profile'])->name('profile');
        Route::get('logout',[MahasiswaAuthController::class, 'logout'])->name('logout');
        Route::post('profile/update',[MahasiswaAuthController::class, 'update_profile'])->name('update_profile');
        Route::get('pengajuan_surat',[MahasiswaSuratController::class, 'pengajuan_surat'])->name('pengajuan_surat');
        Route::get('surat/detail/{id}',[MahasiswaSuratController::class, 'detail_surat'])->name('detail_surat');
        Route::post('surat/pengajuan',[MahasiswaSuratController::class, 'insert'])->name('surat_insert');
        Route::get('kode_anjungan/{kode}',[MahasiswaSuratController::class, 'kode_anjungan'])->name('kode_anjungan');
    });
});

// Route::resource('user', ManagementUserController::class); //otomatis mengambil nama function dan menyesuaikan http requestnya
Route::get('home', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    return view('mahasiswa.index');
});
Route::post('temp/file/upload',[FileUploadTempController::class,'temp_upload'])->name('temp-upload');
Route::get('temp/file/delete/{filename?}',[FileUploadTempController::class,'temp_delete'])->name('temp_delete');
// Route::curr
