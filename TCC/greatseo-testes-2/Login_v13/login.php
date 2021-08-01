<?php
 
// inclui o arquivo de inicialização
require 'init.php';
 
// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
 
if (empty($email) || empty($password))
{
    exit();
    echo "Informe email e senha";
}
 
// cria o hash da senha
//$passwordHash = make_hash($password);

/*
echo $password;
echo "<br><br>";
echo $passwordHash;
*/


 //suasenha

$PDO = db_connect();
 
$sql = "SELECT Cod_Auto,Nome_Auto FROM autoescolas WHERE Email = :email AND Pass = :password";
	$valor_descriptografado = base64_decode($password);
    

$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{  
	exit();
}
 
// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['Cod_Auto'];
$_SESSION['user_name'] = $user['Nome_Auto'];
 
header('Location: ../aplicacao.php');
?>