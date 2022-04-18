<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatatanRequest extends FormRequest
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
            'nama_tempat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tanggal' => 'required',
            'jam' => 'required',
            'suhu_tubuh' => 'required|numeric|max:40',
            'kendaraan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'max' => 'Anda terlalu banyak memasukkan informasi',
            'suhu_tubuh.max' => 'Mohon masukkan suhu tubuh yang normal'
        ];
    }
}
