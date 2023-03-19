<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ModuleConfigSave extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'module' => 'required|in:user',
            'key' => 'required',
            'value' => 'nullable'
        ];
    }

    public function messages()
    {
        // illiteracy prompt
        return [
            'module' => '模块配置必须',
            'module.in' => '模块不在允许范围内'
        ];
    }
}