<?php

	session_start();
	$cod_auto = $_SESSION['user_id'];
	$data = $_POST['data_aula'];
	$id_aluno = $_POST['id_aluno'];
	$id_aula = $_POST['id_aula'];
	$id_veiculo = $_POST['id_veiculo'];
	$id_instrutor = $_POST['id_instrutor'];

	$hr_inicio = $_POST['hr_inicio'];
	$hr_fim = $_POST['hr_fim'];


	include("../conexao.php");

	$sql = "UPDATE AGENDA SET COD_CLI = '$id_aluno', Data = '$data',
	TimeStart = '$hr_inicio', TimeOver = '$hr_fim' , Cod_Vei = '$id_veiculo', Cod_Ins = '$id_instrutor' WHERE Cod_Age = '$id_aula'";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	

?>