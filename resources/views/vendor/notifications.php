<?php

use Parse\ParseClient;

$testObject = ParseObject::create("TestObject");
$testObject->set("foo", "bar");
$testObject->save();