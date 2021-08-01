<?php
header('Content-Type: text/html; charset=utf-8');	

	session_start();

	include("../conexao.php");

	
	$id = $_SESSION['user_id'];
	$data = $_POST['date'];

	$sql = "SELECT * FROM agenda left JOIN cliente ON agenda.Cod_Cli = cliente.Cod_Cli 
	inner join instrutor ON instrutor.Cod_Ins = agenda.Cod_Ins
	inner join veiculo ON veiculo.Cod_Vei = agenda.Cod_Vei
	WHERE agenda.Cod_Auto = $id AND Data = '$data'";

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
		$instrutor = $row['Nome'];
		$veiculo = $row['Modelo'];

$myArray = array(
	'data' => $row['Data'],
	'nome' => utf8_encode($aluno),
	'horaInicial' => $row['TimeStart'],
	'horaFinal' => $row['TimeOver'], 
	'cod_age' => $row['Cod_Age'], 
	'instrutor' => utf8_encode($instrutor), 
	'veiculo' => utf8_encode($veiculo), 
);

		
$arrAlunos["alunos"][] = $myArray;		
	}



	echo json_encode($arrAlunos);

?>