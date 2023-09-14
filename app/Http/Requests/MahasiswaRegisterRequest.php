<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class MahasiswaRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nim' => 'required|max:9|unique:\App\Models\Mahasiswa,nim',
            'nama' => 'required|regex:/^[\pL\s]+$/u',
            'email'=>'required|email',
            'prodi_id'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'tanggal_lahir'=>'required|date',
//            'password'=>['required',Password::min(8)->letters()->numbers()],
            'password'=>'required',
            // 'password_confirmed'=>'same:password',
        ];
    }
}
