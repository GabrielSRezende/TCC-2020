<?php

	session_start();
	$cod_auto = $_SESSION['user_id'];
	$data = $_POST['data_aula'];
	$id_aluno = $_POST['id_aluno'];
	$id_instrutor = $_POST['id_instrutor'];
	$id_veiculo = $_POST['id_veiculo'];

	$hr_inicio = $_POST['hr_inicio'];
	$hr_fim = $_POST['hr_fim'];

	echo $hr_inicio;
	echo $hr_fim;

	if($id_aluno == '')
	{$id_aluno = 0;}


	include("../conexao.php");

	$sql = "INSERT INTO AGENDA (COD_AUTO,COD_CLI,DATA,TIMESTART,TIMEOVER,Cod_Ins,Cod_Vei) VALUES ('$cod_auto','$id_aluno','$data','$hr_inicio','$hr_fim','$id_instrutor','$id_veiculo')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	

?>