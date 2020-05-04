<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$lugar = $_POST['lugar'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.ssbjalisco.com.mx';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contacto@ssbjalisco.com.mx';                     // SMTP username
    $mail->Password   = 'Guadalajara1';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('contacto@ssbjalisco.com.mx', 'CFE');
    $mail->addAddress('francisco.reyna@alumnos.udg.mx');     // Add a recipient
   

    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contratación de servicios eléctricos';
    $mail->Body    = 'Estimado ' .$nombre. ' Le adjuntamos los archivos donde se especifican los requisitos necesarios para la contratación de algún servicio';
    // $mail->AltBody = 'ola c:';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>


