<?php

require 'vendor/autoload.php';
 
use Parse\ParseClient;
 
ParseClient::initialize('FWLLWZk8Adonl3ixkHu71nPUDaM1R2uFcmZJKQA5', 'hbWpEyWaIIMnmDfFW2wOBGAuEWWm9Af6iUlEIn60', 'RzTrmMinir7BJMxFt4kUinaeKWDbRZ7bQb1ZZeqv');

$testObject = ParseObject::create("TestObject");
$testObject->set("foo", "bar");
$testObject->save();