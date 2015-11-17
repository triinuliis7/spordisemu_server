<?php

	include 'database.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json, true);
        $practice_id = $json['practice_id'];
        $min = $json['min'];
        $max = $json['max'];
        $gender = $json['gender'];
        $sql = "INSERT INTO additional (practice_id, min, max, gender) 
                VALUES ('$practice_id', '$min', '$max', '$gender')
                RETURNING practice_id, min, max, gender";
    } else {
        $sql = "SELECT * FROM additional where practice_id='$practice_id'";
    }

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);
