<?php

	include 'database.php';
	
	if(isset($username))
	{		
		echo $username;
		$sql = "SELECT * FROM users WHERE username='test' ";
	}
	else {
		$sql = "SELECT * from users";
	}

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);

	

   
   