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
    $myarray = array()
    while ($row = pg_fetch_row($ret)) {
      $myarray[] = $row;
    }

    pg_close($db);

	

   
   