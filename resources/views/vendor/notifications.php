<?php

$vars = '{"where":"{}",
    "data": { "alert": "greetings programs" } }';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://api.parse.com/1/push");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array();
$headers[] = 'X-Parse-Application-Id: FWLLWZk8Adonl3ixkHu71nPUDaM1R2uFcmZJKQA5';
$headers[] = 'X-Parse-REST-API-Key: hbWpEyWaIIMnmDfFW2wOBGAuEWWm9Af6iUlEIn60';
$headers[] = 'Content-Type: application/json';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

print  $server_output ;