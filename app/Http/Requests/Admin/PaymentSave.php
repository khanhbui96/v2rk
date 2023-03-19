<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaymentSave extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'payment' => 'required',
            'config' => 'required',
            'icon_type' => 'nullable|in:1,2,3,4',
            'notify_domain' => 'nullable|url'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '显示名称不能为空',
            'payment.required' => '网关参数不能为空',
            'config.required' => '配置参数不能为空',
            'icon_type.in' => '图表类型参数不正确',
            'notify_domain.url' => '自定义通知域名格式有误',
        ];
    }
}