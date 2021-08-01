<?php

session_start();

 include("conexao.php");

 $id = $_SESSION['user_id'];

$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$CorpoEmail = $_POST['CorpoEmail'];
$CodCli = $_POST['CodCli'];

$sql = "INSERT INTO mensagem (Mensagem,DataEnvio, NomeCliente, Email,Cod_Auto,Cod_Cli ) VALUES ('$CorpoEmail', now(), '$Nome','$Email', $id,$CodCli  )";
  if ($conn->query($sql) === TRUE) {
                  
                     require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->IsSMTP();

    $mail->SMTPDebug = 1;

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'tls';

    $mail->Username = 'autohelpapp2020@gmail.com';

    $mail->Password = 'autohelp2020';

    $mail->Port = 587;

    $mail->setFrom('AutoSystemHelp@gmail.com');
    $mail->addReplyTo('no-reply@email.com.br');

    $mail->addAddress($Email, $Nome);



    $mail->isHTML(true);
    $mail->Subject = 'Auto Help';
    $mail->Body    = $CorpoEmail;
    $mail->AltBody = 'Para visualizar essa mensagem acesse nada';

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;

    } else {
        echo 'Mensagem enviada.';
    }


                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
?>
