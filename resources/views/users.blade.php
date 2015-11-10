<?php

	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "Actual";
	echo $actual_link;
	echo "Host";
	echo $_SERVER[HTTP_HOST];
	echo "Request";
	echo $_SERVER[REQUEST_URI];
	
	
   $host        = "host=ec2-54-163-228-109.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=d1h5f179s0jvci";
   $credentials = "user=pnihhawbybmwbv password=UtOUDwOTDtieWfqFt7XZhffMnR";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      SELECT * from users;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)){
      echo "user_id = ". $row[0] . "\n";
      echo "username = ". $row[1] ."\n";
      echo "password = ". $row[2] ."\n";
   }
   echo "Operation done successfully\n";
   pg_close($db);