<?php

namespace App\Http\Controllers\Api\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaLoginRequest;
use App\Http\Requests\MahasiswaRegisterRequest;
use App\Http\Requests\SaveNewPasswordRequest;
use App\Mail\ResetPassword;
use App\Mail\Verification;
use App\Models\Mahasiswa;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ApiResponse;
    public function register(MahasiswaRegisterRequest $request)
    {
        $input = $request->only(['nim', 'nama', 'email', 'prodi_id', 'alamat', 'no_hp', 'tanggal_lahir', 'password']);
        $mhs = Mahasiswa::create($input);
        #belum di implementasikan ya ges ya....
        // Mail::to($input['email'])->send(new Verification($input['email'],$mhs->uuid));
        return $this->successResponse('Akun anda sudah terdaftar.. Silahkan cek akun gmail anda dan verifikasi sekarang');
    }

    public function login(MahasiswaLoginRequest $request)
    {
        $input = $request->only(['nim', 'password']);
        try {
            if (!$token = JWTAuth::attempt($input)) return $this->internalErrorResponse("Cek kembali password atau email anda",);
        } catch (JWTException $e) {
            return $this->internalErrorResponse("Ada yang salah :(");
        }

        //Token created, return with success response and jwt token
        $data = array(
            'user' => Auth::user(),
            'success' => true,
            'token' => $token,
        );
        return $this->successResponseData("Berhasil Login", $data);
    }

    public function check()
    {
        $data = array(
            'user' => Auth::user(),
        );
        return $this->successResponseData("Berhasil Login", $data);
    }

    public function logout()
    {
        Auth::logout();
        JWTAuth::parseToken()->invalidate('true');
        return $this->successResponse("Berhasil logout",);
    }

    public function reset_password(Request $request)
    {
        $token = Str::uuid();

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::to($request->email)->send(new ResetPassword($request->email, $token));
        return $this->successResponse('Permintaan reset password telah berhasil, mohon cek email anda.');
    }

    public function save_password(SaveNewPasswordRequest $request, $token)
    {

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $token
            ])
            ->first();
        $resetTime = Carbon::createFromTimeString($updatePassword->created_at);
        
        if (!$updatePassword) return $this->internalErrorResponse('Oopss token tidak valid');
        if ($resetTime->addHour() >= Carbon::now() ) return $this->internalErrorResponse('Oopss token telah expired');

        $user = Mahasiswa::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return $this->successResponse('Password berhasil direset');
    }

    public function update_account(Request $request)
    {
        $input = $request->only(['nim','nama','password','alamat','no_hp']);
        if($request->has('password')) $input = $request->only(['nim','nama','password','alamat','no_hp']); 
        $auth = Auth::user();
        Mahasiswa::find($auth->uuid)->update($input);
        return $this->successResponse('Data Akun berhasil diubah');
    }
}
