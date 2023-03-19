<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderAssign extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plan_id' => 'required',
            'email' => 'required',
            'total_amount' => 'required',
            'price_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'plan_id.required' => '订阅不能为空',
            'email.required' => '邮箱不能为空',
            'total_amount.required' => '支付金额不能为空',
            'price_id.required' => '订阅周期不能为空',
        ];
    }
}