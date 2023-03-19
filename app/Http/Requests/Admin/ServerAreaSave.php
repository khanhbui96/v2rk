<?php

namespace App\Http\Requests\Admin;

use App\Rules\EmojiRule;
use Illuminate\Foundation\Http\FormRequest;

class ServerAreaSave extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'flag' => ['required', new EmojiRule("国旗格式必须为emoji")],
            'country' => 'required',
            'country_code' => 'required',
            'lng' => 'required|numeric',
            'lat' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'flag.required' => '国旗(emoji)不能为空',
            'country.required' => '国家不能为空',
            'country_code.required' => '国家代码不能为空',
            'lng.required' => '经度不能为空',
            'lat.required' => '纬度不能为空'
        ];
    }
}