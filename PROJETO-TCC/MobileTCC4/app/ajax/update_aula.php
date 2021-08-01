<?php

	session_start();
	$id_aluno = $_POST['id_aluno'];
	$id_aula = $_POST['id_aula'];
	


	include("../../conexao.php");

	$sql = "UPDATE AGENDA SET COD_CLI = '$id_aluno' WHERE Cod_Age = '$id_aula'";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	

?>