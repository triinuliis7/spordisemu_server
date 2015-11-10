<?php

    include 'database.php';
    
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
