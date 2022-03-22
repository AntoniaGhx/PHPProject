<?php
	// Database connection

    $server="localhost";
    $user="root";
    $parola="";
    $db="userapp";

	$conn = new mysqli($server,$user,$parola,$db);
	
  if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
  }
?>