<?php

	include 'database.php';
	
	if(isset($practice_id))
    {
        $sql = "SELECT * FROM practices where practice_id='$practice_id'";
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $json = file_get_contents('php://input');
            $json = json_decode($json, true);
            $type = $json['type'];
            $timestamp = $json['timestamp'];
            $location = $json['location'];
            $level = $json['level'];
            $user_id = $json['user_id'];
            $sql = "INSERT INTO practices (type, timestamp, location, level, user_id) 
                    VALUES ('$type', '$timestamp', '$location', '$level', '$user_id') 
                    RETURNING practice_id, type, timestamp, location, level, user_id";
        } else {
            $sql = "SELECT * from practices";
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
