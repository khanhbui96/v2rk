<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PlanSave extends FormRequest
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
            'content' => '',
            'transfer_enable' => 'required',
            'prices' => 'nullable|array',
            'prices.*.id' => 'required',
            'prices.*.name' => 'required',
            'prices.*.value' => 'required|integer|min:0',
            'prices.*.type' => 'required|integer|in:1,2,3',
            'prices.*.expire_type' => 'nullable|in:day,month,year',
            'prices.*.expire_value' => 'nullable|integer|min:1',
            'time_limit' => 'integer|in:0,1',
            'start_sec' => 'nullable|integer',
            'end_sec' => 'nullable|integer',
            'reset_traffic_method' => 'nullable|integer|in:-1,0,1,2',
            'allow_ids' => 'nullable|array',
            'allow_ids.*' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '套餐名称不能为空',
            'type.required' => '套餐类型不能为空',
            'type.in' => '套餐类型格式有误',
            'prices.*.id.required' => '价格项ID有误',
            'prices.*.name.required' => '价格项名称必须',
            'prices.*.type.required' => '价格项类型必须',
            'prices.*.value.required' => '价格项值必须',
            'prices.*.value.integer' => '价格项值类型有误',
            'prices.*.value.min' => '价格项值必须大于0',
            'prices.*.type.in' => '价格项类型取值范围有误',
            'prices.*.expire_type.in' => '价格项过期类型取值范围有误',
            'prices.*.expire_value.min' => '价格项过期值必须大约1',
            'time_limit.in' => '时间限制取值范围有误',
            'time_limit.integer' => '时间限制格式有误',
            'start_sec.integer' => '开始时间有误',
            'end_sec.integer' => '结束时间有误',
            'transfer_enable.required' => '流量不能为空',
            'reset_traffic_method.integer' => '流量重置方式格式有误',
            'reset_traffic_method.in' => '流量重置方式格式有误',
            'allow_ids.array' => '购买订阅条件格式有误',
            'allow_ids.*.integer' => '购买订阅条件格式有误'
        ];
    }
}