<?php 

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'autohelp';

	$varA = "";

	$conn = new mysqli($host,$user,$pass,$db);
	$conn->set_charset("utf8");
	if($conn->connect_errno) {
		printf("Connect failed: %s\n", $conn->connect_error);
		exit();
	} 

?>