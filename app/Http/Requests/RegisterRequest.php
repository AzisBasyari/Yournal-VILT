<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nik' => 'required|digits:16|unique:users|numeric',
            'nama_lengkap' => 'required|max:255',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'NIK telah terdaftar!',
            'min' => 'Minimal :min karakter!',
            'max' => 'Maksimal :max karakter!',
            'same' => 'Konfirmasi kata sandi harus sama dengan kata sandi awal anda!',
            'digits' => 'Harus berisi :digits karakter!',
            'numeric' => 'Harus berisi angka saja'
        ];
    }
}
