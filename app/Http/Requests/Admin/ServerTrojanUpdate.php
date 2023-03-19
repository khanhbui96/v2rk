<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServerTrojanUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'show' => 'nullable|integer|in:0,1',
            'check' => 'nullable|integer|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'show.in' => '显示状态格式不正确',
            'show.integer' => '显示状态格式不正确',
            'check.in' => '检查状态格式不正确',
            'check.integer' => '检查状态格式不正确',
        ];
    }
}