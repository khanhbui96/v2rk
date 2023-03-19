<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class OrderSave extends FormRequest
{


    public function rules()
    {
        return [
            'plan_id' => 'required|integer',
            'price_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}