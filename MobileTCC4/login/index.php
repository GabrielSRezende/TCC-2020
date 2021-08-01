<?php /*
    include_once("../conexao.php");
    $pdo = new PDO('mysql:host=localhost;dbname=autohelp', 'root', ''); 

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cont = 0;

    $statement = $pdo->prepare("SELECT * FROM cliente WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

    $sql = ("SELECT Cod_Cli, Nome_Cli FROM cliente WHERE Email = '$email' AND Pass = '$password'");
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    { $Cod = $row['Cod_Cli'];
    $cont++;}
    if($cont<=0){
        $errorMessage = "E-mail ou senha incorreto!<br>";
    } else {
        $_SESSION['login'] = $Cod;
        header('Location: ../app/index.php');
    }*/


 
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
 
$sql = "SELECT Cod_Cli, Nome_Cli, Status, Cod_Auto FROM cliente WHERE Email = :email AND Pass = :password";

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
$_SESSION['cod_cli'] = $user['Cod_Cli'];
$_SESSION['user_name'] = $user['Nome_Cli'];
$_SESSION['status'] = $user['Status'];
$_SESSION['cod_auto'] = $user['Cod_Auto'];

if($_SESSION['status']=="I")
{
    header('Location: ../app/publication.php');
} else {
    header('Location: ../app/index.php');
}
    
?>