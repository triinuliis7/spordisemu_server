<?php

	include 'database.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json, true);
        $user_id = $json['user_id'];
        $sports = $json['sports'];
        $level = $json['level'];
        $sql = "INSERT INTO sports (user_id, sports, level) 
                VALUES ('$user_id', '$sports', '$level')
                RETURNING sports_id, user_id, sports, level";
    } else {
        $sql = "SELECT * FROM sports where user_id='$user_id'";
    }

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);
