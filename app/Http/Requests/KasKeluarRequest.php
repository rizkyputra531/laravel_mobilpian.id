<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KasKeluarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name'  => 'required|string|max:255',
            'jenis_pengeluaran'  => 'required|string|max:255',
            'keterangan'  => 'required|string|max:255',
            'tanggal'  => 'required|date',
            'quantity'  => 'required|integer',
            'harga'  => 'required|numeric',
            'total'  => 'required|numeric',
            

        ];
    }
}
