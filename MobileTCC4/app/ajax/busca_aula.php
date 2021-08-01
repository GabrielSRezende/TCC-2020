<?php
header('Content-Type: text/html; charset=utf-8');	

	session_start();

	include("../../conexao.php");

	
	$cod_auto = $_SESSION['cod_auto'];
	$data = $_POST['date'];

	$sql = "SELECT * FROM agenda WHERE Cod_Auto = $cod_auto and Cod_Cli = 0 and data = '$data'";

	$result = $conn->query($sql);
	$cont = 0;
	$datarr = array();
	$arrAluno = array();
	$myArray = array();
	$arrAlunos = array();
	
	while($row = $result->fetch_assoc())
	{
		$data = $row['Data'];
		$horaInicial = $row['TimeStart'];
		$horaFinal = $row['TimeOver'];
		$cod_age = $row['Cod_Age'];

		$myArray = array(
			'data' => $row['Data'],
			'horaInicial' => $row['TimeStart'],
			'horaFinal' => $row['TimeOver'], 
			'cod_age' => $row['Cod_Age'], 
		);

		
		$arrAlunos["alunos"][] = $myArray;
		
		
	}



	echo json_encode($arrAlunos);
		/*$return_arr[] = array(
		  "data" => "$data",	
		  "nomeAluno" => "$aluno",
		  "horaInicial" => "$horaInicial", 
		  "horaFinal" => "$horaFinal"); 

	
	//echo json_encode($return_arr);
	echo json_encode(array(
		  "data" => "$data",	
		  "nomeAluno" => "$aluno",
		  "horaInicial" => "$horaInicial", 
		  "horaFinal" => "$horaFinal"));*/

?>