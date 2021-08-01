<?php
header('Content-Type: text/html; charset=utf-8');	

	session_start();

	include("../../conexao.php");

	
	$id = $_SESSION['cod_cli'];
	$data = $_POST['date'];

	$sql = "SELECT * FROM agenda INNER JOIN cliente ON agenda.Cod_Cli = cliente.Cod_Cli 
	WHERE agenda.Cod_Cli = $id AND Data = '$data'";

	$result = $conn->query($sql);
	$cont = 0;
	$datarr = array();
	$arrAluno = array();
	$myArray = array();
	$arrAlunos = array();
	
	while($row = $result->fetch_assoc())
	{
		$data = $row['Data'];
		$aluno = $row['Nome_Cli'];
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
		//array_push($arrAluno,$data);
		
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