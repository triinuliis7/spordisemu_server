<?php

$APPLICATION_ID = "FWLLWZk8Adonl3ixkHu71nPUDaM1R2uFcmZJKQA5";
$REST_API_KEY = "hbWpEyWaIIMnmDfFW2wOBGAuEWWm9Af6iUlEIn60";
$MESSAGE = "your-alert-message";

if (!empty($_POST)) {

    $errors = array();
    foreach (array('app' => 'APPLICATION_ID', 'api' => 'REST_API_KEY', 'body' => 'MESSAGE') as $key => $var) {
        if (empty($_POST[$key])) {
            $errors[$var] = true;
        } else {
            $$var = $_POST[$key];
        }
    }

    if (!$errors) {
        $url = 'https://api.parse.com/1/push';
        $data = array(
            'channel' => '',
            'type' => 'android',
            'expiry' => 1451606400,
            'data' => array(
                'alert' => $MESSAGE,
            ),
        );
        $_data = json_encode($data);
        $headers = array(
            'X-Parse-Application-Id: ' . $APPLICATION_ID,
            'X-Parse-REST-API-Key: ' . $REST_API_KEY,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($_data),
        );

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
    }
}