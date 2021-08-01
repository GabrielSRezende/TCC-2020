<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

	include("../conexao.php");
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];

	$cnpj = $_POST["cnpj"];
	$end = $_POST["end"];
	$comp = $_POST["comp"];
	$telc = $_POST["telc"];
	$telf = $_POST["telf"];
	$Cep_Cadastro_Autoescola = $_POST["Cep_Cadastro_Autoescola"];
	$Bairro_Cadastro_Autoescola = $_POST["Bairro_Cadastro_Autoescola"];
	$Cidade_Cadastro_Autoescola = $_POST["Cidade_Cadastro_Autoescola"];
	$Numero_Cadastro_Autoescola = $_POST["Numero_Cadastro_Autoescola"];
	$UF = $_POST["txtUfCadastro"];
	

	$sql = "INSERT INTO autoescolas ( Nome_Auto, Nome_UsAu, Email, Pass, CNPJ, Endereco, Complemento, Telefone_C, Telefone_Fix, CEP, Bairro, Cidade, UF, Numero) VALUES ('$name','$username','$email','$pass','$cnpj','$end','$comp','$telc','$telf','$Cep_Cadastro_Autoescola','$Bairro_Cadastro_Autoescola','$Cidade_Cadastro_Autoescola','UF','Numero_Cadastro_Autoescola')";
	if($conn->query($sql)===TRUE){
		header('Location: login.html');
	} else {header('Location: login.html');}

	
?>


</body>
</html>