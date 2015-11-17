<?php

	include 'database.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json, true);
        $user_id = $json['user_id'];
        $practice_id = $json['practice_id'];
        $sql = "INSERT INTO attends (user_id, practice_id) 
                VALUES ('$user_id', '$practice_id')
                RETURNING attend_id, user_id, practice_id";
    } else {
        $sql = "SELECT * FROM attends where practice_id='$practice_id'";
    }

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);
