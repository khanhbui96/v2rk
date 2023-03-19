<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServerShadowsocksSave extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'show' => '',
            'name' => 'required',
            'plan_id' => 'required|array',
            'parent_id' => 'nullable|integer',
            'area_id' => 'required|integer',
            'host' => 'required',
            'port' => 'required|integer',
            'server_port' => 'required|integer',
            'cipher' => 'required|in:aes-128-gcm,aes-256-gcm,chacha20-ietf-poly1305',
            'tags' => 'nullable|array',
            'ips' => 'nullable|array',
            'ips.*' => 'ip',
            'rate' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '节点名称不能为空',
            'plan_id.required' => '订阅不能为空',
            'area_id.required' => '区域不能为空',
            'plan_id.array' => '订阅格式不正确',
            'area_id.integer' => '区域格式不正确',
            'host.required' => '节点地址不能为空',
            'port.required' => '连接端口不能为空',
            'server_port.required' => '后端服务端口不能为空',
            'cipher.required' => '加密方式不能为空',
            'tags.array' => '标签格式不正确',
            'ips.array' => '负载IP格式不正确',
            'ips.*.ip' => '负载IP中存在非IP格式的数据',
            'rate.required' => '倍率不能为空',
            'rate.numeric' => '倍率格式不正确',
            'port.integer' => '连接端口格式不正确',
            'server_port.integer' => '服务端口格式不正确'
        ];
    }
}