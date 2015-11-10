<?php

	$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
	echo $url_path;

	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "Actual";
	echo $actual_link;
	
	
   $host        = "host=ec2-54-163-228-109.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=d1h5f179s0jvci";
   $credentials = "user=pnihhawbybmwbv password=UtOUDwOTDtieWfqFt7XZhffMnR";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      SELECT * from users;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)){
      echo "user_id = ". $row[0] . "\n";
      echo "username = ". $row[1] ."\n";
      echo "password = ". $row[2] ."\n";
   }
   echo "Operation done successfully\n";
   pg_close($db);

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
