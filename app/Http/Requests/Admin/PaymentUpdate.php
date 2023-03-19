<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'enable' => 'in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID格式不正确',
            'enable.in' => '启用状态格式不正确',
        ];
    }
}