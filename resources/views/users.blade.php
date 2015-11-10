<?php

	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "Actual";
	echo $actual_link;
	echo "Host";
	echo $_SERVER[HTTP_HOST];
	echo "Request";
	echo $_SERVER[REQUEST_URI];
	

   
   