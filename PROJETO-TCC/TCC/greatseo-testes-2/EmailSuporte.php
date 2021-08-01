<?php

session_start();

 include("conexao.php");

 $id = $_SESSION['user_id'];

$CorpoEmail = $_POST['CorpoEmail'];

$sql = "INSERT INTO suporte (Mensagem,DataEnvio,Cod_Auto) VALUES ('$CorpoEmail', now(),$id)";
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

    $mail->addAddress('autohelpapp2020@gmail.com', 'Cliente');



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
