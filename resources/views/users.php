<?php

	include 'database.php';
	
	if(isset($username))
    {
        $sql = "SELECT * FROM users where username='$username'";
    }
    else {
        if($_SERVER["REQUEST_METHOD"] == "PUT") {
            $data = array();
            $data = json_decode(file_get_contents("php://input"), true);
            echo $data;
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

	

   
   