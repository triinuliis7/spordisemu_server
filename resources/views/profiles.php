<?php

	include 'database.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json, true);
        $user_id = $json['user_id'];
        $sports = $json['sports'];
        $level = $json['level'];
        $location = $json['location'];
        $pic = $json['pic'];
        $sql = "INSERT INTO profiles (user_id, location, pic) 
                VALUES ('$user_id', '$location', '$pic')";
    } else {
        $sql = "SELECT * FROM profiles where user_id='$user_id'";
    }

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);

	

   
   