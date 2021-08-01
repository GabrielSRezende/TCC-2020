<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

	include("../conexao.php");

	$name = $_POST["name"];
	$email= $_POST["email"];
	$pass = $_POST["pass"];
	$cpf = $_POST["cpf"];
	$datanasc = $_POST["datanasc"];
	$cep = $_POST["cep"];
	$endereco = $_POST["endereco"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$uf = $_POST["uf"];
	$numero = $_POST["numero"];
	$complemento = $_POST["complemento"];
	$telefone = $_POST["telefone"];
	
	$sql = "INSERT INTO cliente (Cod_Auto, Nome_Cli, Email, Pass, CPF, Datanasc, CEP, Endereco, Bairro, Cidade, UF, Numero, Complemento, Telefone, Status) VALUES 
	(31,'$name','$email','$pass','$cpf','$datanasc','$cep','$endereco','$bairro','$cidade','$uf','$numero','$complemento','$telefone', 'I')";
	if($conn->query($sql)===TRUE){
		echo  "<script>alert('Sucesso!);</script>";
		header('Location: index.html');
	} else {echo  "<script>alert('Erro!);</script>"; header('Location: cadastro.html');}
	
	


?>




</body>
</html>