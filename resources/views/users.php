<?php

	include 'database.php';
	
	if(isset($username))
    {
        $sql = "SELECT * FROM users where username='$username'";
    }
    else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $json = file_get_contents('php://input');
            $json = json_decode($json, true);
            print_r($json);
            $user = $json['firstname'];
            echo $user;
            //$user = $json['firstname'];
            //echo $user;
            $sql = "SELECT * from users where username='kalle123'";
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

	

   
   