<?php

	session_start();
	$cod_auto = $_SESSION['cod_auto'];
	
	$id_aula = $_POST['id_aula'];

	


	include("../../conexao.php");

	$sql = "DELETE from AGENDA WHERE Cod_Age = '$id_aula'";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	

?>

