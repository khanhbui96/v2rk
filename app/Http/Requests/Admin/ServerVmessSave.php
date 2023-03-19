<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServerVmessSave extends FormRequest
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
            'tls' => 'required',
            'tags' => 'nullable|array',
            'rate' => 'required|numeric',
            'alter_id' => 'required|integer',
            'network' => 'required|in:tcp,ws,grpc',
            'networkSettings' => 'nullable|array',
            'ruleSettings' => 'nullable|array',
            'tlsSettings' => 'nullable|array',
            'dnsSettings' => 'nullable|array',
            'ips' => 'nullable|array',
            'ips.*' => 'ip',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '节点名称不能为空',
            'plan_id.required' => '订阅不能为空',
            'plan_id.array' => '订阅格式不正确',
            'parent_id.integer' => '父ID格式不正确',
            'area_id.required' => '区域不能为空',
            'area_id.integer' => '区域格式不正确',
            'host.required' => '节点地址不能为空',
            'port.required' => '连接端口不能为空',
            'server_port.required' => '后端服务端口不能为空',
            'port.integer' => '连接端口格式不正确',
            'server_port.integer' => '后端服务端口格式不正确',
            'tls.required' => 'TLS不能为空',
            'tags.array' => '标签格式不正确',
            'rate.required' => '倍率不能为空',
            'rate.numeric' => '倍率格式不正确',
            'ips.array' => '负载IP格式不正确',
            'ips.*.ip' => '负载IP中存在非IP格式的数据',
            'network.required' => '传输协议不能为空',
            'alter_id.required' => 'AlterID不能为空',
            'alter_id.integer' => 'AlterID格式不正确',
            'network.in' => '传输协议格式不正确',
            'networkSettings.array' => '传输协议配置有误',
            'ruleSettings.array' => '规则配置有误',
            'tlsSettings.array' => 'tls配置有误',
            'dnsSettings.array' => 'dns配置有误'
        ];
    }
}