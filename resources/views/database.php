<?php

    $host        = "host=ec2-54-163-228-109.compute-1.amazonaws.com";
    $port        = "port=5432";
    $dbname      = "dbname=d1h5f179s0jvci";
    $credentials = "user=pnihhawbybmwbv password=UtOUDwOTDtieWfqFt7XZhffMnR";

    $db = pg_connect( "$host $port $dbname $credentials" ) 
        or die ( "Couldn't connect to the database");
