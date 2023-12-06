<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
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

            'name' =>'required|string|max:255',
            'start_date' =>'required|date',
            'end_date' =>'required|date',
            'address' =>'required|string|max:255',
            'city' =>'required|string|max:255',
            'zip' =>'required|string|max:255',
            'status' =>'required|string|max:255',
            'payment_method' =>'required|string|max:255',
            'payment_status' =>'required|string|max:255',
            'payment_url' =>'required|string|max:255',
            'total_price' =>'required|numeric',
            'item_id' =>'required|integer|exists:items,id',
            'user_id' =>'required|integer|exists:users,id',
        ];


    }
}
