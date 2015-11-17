<?php

	include 'database.php';
	
	if (isset($username))
    {
        $sql = "SELECT * FROM users where username='$username'";
    } else if (isset($user_id)) {
        $sql = "SELECT * FROM users where id='$user_id'";
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $json = file_get_contents('php://input');
            $json = json_decode($json, true);
            $firstname = $json['firstname'];
            $lastname = $json['lastname'];
            $username = $json['username'];
            $gender = $json['gender'];
            $email = $json['email'];
            $password = $json['password'];
            $sql = "INSERT INTO users (firstname, lastname, username, gender, email, password) 
                    VALUES ('$firstname', '$lastname', '$username', '$gender', '$email', '$password') 
                    RETURNING id, firstname, lastname, username, gender, email, password";
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
