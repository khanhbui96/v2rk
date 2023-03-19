<?php

namespace App\Http\Requests\User;

use App\Rules\RechargeRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRecharge extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $minValue = config('v2board.min_recharge_amount', 1);
        $maxValue = config('v2board.max_recharge_amount', 1000);

        return [
            'recharge_amount' => ['required', 'integer', new RechargeRule($minValue, $maxValue)]
        ];
    }

    public function messages()
    {
        return [
            'recharge_amount.required' => __('The recharge amount cannot be empty'),
            'recharge_amount.integer' => __('The recharge amount parameter is wrong'),
            'recharge_amount.min' => __('The recharge amount parameter is wrong')
        ];
    }
}