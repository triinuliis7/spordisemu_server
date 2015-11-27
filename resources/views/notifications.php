<?php

$url = 'https://api.parse.com/1/push';
$data = array(
    'where' => '{}',
    'type' => 'android',
    'data' => array(
        'alert' => 'greetings programs',
    ),
);
$_data = json_encode($data);
$headers = array(
	'X-Parse-Application-Id: FWLLWZk8Adonl3ixkHu71nPUDaM1R2uFcmZJKQA5',
	'X-Parse-REST-API-Key: hbWpEyWaIIMnmDfFW2wOBGAuEWWm9Af6iUlEIn60',
    'Content-Type: application/json',
    'Content-Length: ' . strlen($_data),
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_exec($curl);
