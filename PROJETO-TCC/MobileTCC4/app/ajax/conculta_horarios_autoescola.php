<?php
header('Content-Type: text/html; charset=utf-8');	

	session_start();

	include("../../conexao.php");

	
	$id = $_SESSION['user_id'];
	$data1 = $_POST['date'];

	$sql = "SELECT * FROM `agenda` INNER JOIN `cli_users` ON agenda.Cod_Cli = cli_users.Cod_Cli 
	WHERE agenda.Cod_Auto = $id AND Data = '$data1'";

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

			$myArray = array(
				'data' => $row['Data'],
				'nome' => utf8_encode($aluno),
				'horaInicial' => $row['TimeStart'],
				'horaFinal' => $row['TimeOver'], 
			);
					
			$arrAlunos["alunos"][] = $myArray;		
					
	}



	echo json_encode($arrAlunos);
		
?>