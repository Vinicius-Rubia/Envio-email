<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sua_conta_email@gmail.com';                     //SMTP username
    $mail->Password   = 'sua_senha';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Destinatários
    $mail->setFrom('sua_conta_email@gmail.com', 'SEU_NOME'); //quem envia
    $mail->addAddress('email_quem_recebe@tete.com');     //quem  recebe
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com'); //cópia
    //$mail->addBCC('bcc@example.com'); //cópia oculta

    //Anexo
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Conteúdo
    $mail->isHTML(true); //permite HTML no conteúdo do email
    $mail->Subject = 'Teste de envio de email'; //Assunto do email
    $mail->Body    = '<b>Bem-vindo</b><br>Minha mensagem para o teste de envio de email'; //mensagem do e-mail
    //$mail->AltBody = 'Bem-vindo! Minha mensagem para o teste de envio sem tags html';

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Mensagem não enviada. Erro: {$mail->ErrorInfo}";
}
?>