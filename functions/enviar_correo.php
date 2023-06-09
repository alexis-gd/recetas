<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function enviarCorreo($correo, $asunto, $cuerpo) {

    if (empty($correo)) {
        return 0;
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        // $mail->Host       = 'grupogbp.mx';                    //Set the SMTP server to send through
        $mail->Host       = 'sh-pro26.hostgator.mx';                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'informacion@grupogbp.mx';                     //SMTP username
        $mail->Password   = 'Informacion.2022+';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('informacion@grupogbp.mx', 'Grupo GBP');     //Add a recipient no acepta acentos
        $mail->addAddress($correo);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;
        
        $mail->send();
        return 1;
    } catch (Exception $e) {
        // return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return 0;
    }
}
?>