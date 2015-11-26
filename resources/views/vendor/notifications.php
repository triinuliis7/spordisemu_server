<?php

use jyggen\Curl\Curl;
$url = "http://api.parse.com/1/push"; //the gateway to which you want to post the json payload

$data = '{"where":"{}",
    "data": { "alert": "greetings programs" } }'; //or wherever else you get your json from

$request = new Request($url); // jyggen\Curl\Request

$request->setOption(CURLOPT_FOLLOWLOCATION, true);
$request->setOption(CURLOPT_RETURNTRANSFER, true);

$request->setOption(CURLOPT_POST, true);
$request->setOption(CURLOPT_POSTFIELDS, $data);

$request->setOption(CURLOPT_HTTPHEADER, array(                                                                          
'Content-Type: application/json',
'X-Parse-Application-Id: FWLLWZk8Adonl3ixkHu71nPUDaM1R2uFcmZJKQA5',
'X-Parse-REST-API-Key: hbWpEyWaIIMnmDfFW2wOBGAuEWWm9Af6iUlEIn60',
);

$request->execute();

if ($request->isSuccessful()) {
    return $request->getRawResponse();
} else {
    throw new Exception($resquest->getErrorMessage());
}