<?php


$Nome = $_POST['Nome'];
$Email = $_POST['Email'];

?>
<?php
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
    $mail->Body    = 'Segue link para o cadastro de sua AutoEscola: http://localhost/web-app/TCC/greatseo-testes-2/Login_v13/cadastro2.php?Email='.$Email;
    $mail->AltBody = 'Para visualizar essa mensagem acesse nada';

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;

    } else {
        echo 'Mensagem enviada.';
    }

?>

