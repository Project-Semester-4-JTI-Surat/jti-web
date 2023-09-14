<?php

namespace App\Rules;

use App\Models\Mahasiswa;
use Illuminate\Contracts\Validation\Rule;

class MahasiswaCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Mahasiswa::where($attribute,'=',$value)->first();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sepertinya nim anda tidak ditemukan, anda bisa melakukan registrasi terlebih dahulu';
    }
}
