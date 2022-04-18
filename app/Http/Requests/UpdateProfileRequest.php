<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'nik' => ['required', 'size:16', Rule::unique('users')->ignore(auth()->user()->id)],
            'nama_lengkap' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Mohon isi NIK anda!',
            'nik.unique' => 'NIK telah terdaftar!',
            'nama_lengkap.required' => 'Mohon isi nama lengkap anda!',
            'nik.size' => 'NIK harus berisi :size angka!',
            'numeric' => 'NIK harus berisi angka saja'
        ];
    }
}
