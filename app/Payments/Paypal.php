<?php

namespace App\Payments;

class Paypal {
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function form()
    {
        return [
			'paygate_url' => [
                'label' => 'Cổng thanh toán',
                'description' => '',
                'type' => 'input',
            ],
            'client_id' => [
                'label' => 'Client_ID',
                'description' => '',
                'type' => 'input',
            ],
            'secret_Key' => [
                'label' => 'Secret_Key',
                'description' => '',
                'type' => 'input',
            ]
        ];
    }

    public function pay($order)
    {

		$amount = $order['total_amount'] / 100;
		$trade_no = $order['trade_no'];
		$order['secret_Key'] = $this->config['secret_Key'];
		$order['paygate'] = "paypal";
		
		
		$cipher_method = 'aes-128-ctr';
		$enc_key = $order['secret_Key'];
		$enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
		$crypted_token = openssl_encrypt(json_encode($order), $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
		unset($token, $cipher_method, $enc_key, $enc_iv);

		$sig = bin2hex($crypted_token);

        return [
            'type' => 1, // 0:qrcode 1:url
            'data' => $this->config['paygate_url']."/?paygate=paypal&sig=".$sig
        ];
    }

    public function notify($params)
    {
        $token = $params['token'];
		if($this->config['secret_Key'] != $token)
			return false;
        

        return [
            'trade_no' => $params['trade_no'],
            'callback_no' => $params['out_trade_no']
        ];
    }
	
	
}
