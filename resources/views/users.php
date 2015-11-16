<?php

	include 'database.php';
	
	if(isset($username))
    {
        $sql = "SELECT * FROM users where username='$username'";
    }
    else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $json = file_get_contents('php://input');
            $obj = json_decode($json);
            print_r($json);
            $user = $json["firstname"];
            $sql = "SELECT * from users where username='$user'";
        } else {
            $sql = "SELECT * from users";
        }
    }

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);

	

   
   