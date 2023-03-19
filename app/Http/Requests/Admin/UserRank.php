<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRank extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort' => 'nullable|in:total,n,u,d'
        ];
    }

    public function messages()
    {
        return [
            'sort.in' => '排序类型有误',
        ];
    }
}