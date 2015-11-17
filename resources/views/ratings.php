<?php

	include 'database.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json, true);
        $user_id = $json['user_id'];
        $commenter_id = $json['commenter_id'];
        $rating = $json['rating'];
        $comment = $json['comment'];
        $sql = "INSERT INTO ratings (user_id, commenter_id, rating, comment) 
                VALUES ('$user_id', '$commenter_id', '$rating', '$comment')
                RETURNING rating_id, user_id, commenter_id, rating, comment";
    } else {
        $sql = "SELECT * FROM ratings where user_id='$user_id'";
    }

    $result = pg_query($db, $sql);
    if(!$result){
      echo pg_last_error($db);
      exit;
    } 
    $resultArray = pg_fetch_all($result);
	echo json_encode($resultArray);
    pg_close($db);
