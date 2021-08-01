<?php 
 
	// estabelecer ligação com a base de dados
	include("../conexao.php");

	$username = $_POST["email"];

	$pass = $_POST["password"];

 	$sql = "SELECT * FROM aut_users WHERE Email = '$username' AND  Pass = '$pass'";

	$result = $conn->query($sql);

	$cont = 0;

	while($row = $result->fetch_assoc())
	{

	$cont++;

	}

if($cont>0){
	header('Location: ../aplicacao.php');
}else{
	header('Location: login.php');
}


?>


