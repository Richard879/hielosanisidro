<?php
$suscriptor = htmlspecialchars($_POST['s'],ENT_QUOTES,'UTF-8');
$email = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
$contenido = htmlspecialchars($_POST['c'],ENT_QUOTES,'UTF-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);

try {
    $mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);
    // Configuración del servidor 
    $mail->SMTPDebug = 0;                                             // Habilita la salida de depuración detallada(LA LISTA DE ERRORES)
    $mail->isSMTP();                                                 // Enviar usando SMTP, el protocolo que se va a usar
    $mail->Host       = 'smtp.gmail.com';                           // Configure el servidor SMTP para enviar a través de  cualquier correo(gmail, hotmail, etc)
    $mail->SMTPAuth   = true;                                       // Habilitar autenticación SMTP 
    $mail->Username   = 'richardefio879@gmail.com';                   // SMTP nombre de usuario(correo de quien envia)
    $mail->Password   = 'Amazing879+-*';                               // SMTP CONTRASEÑA
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // // Habilita el cifrado TLS; `PHPMailer :: ENCRYPTION_SMTPS` animó 
    $mail->Port       = 587;                                    //  Puerto TCP para conectarse, use 465 para `PHPMailer :: ENCRYPTION_SMTPS` arriba

    //Recipients
    $mail->setFrom('richardefio879@gmail.com', 'Richard');             //Correo de quien envia
    $mail->addAddress($email, $suscriptor);     // correo de quien recibe
                 
    //$mail->addReplyTo('info@example.com', 'Information');    // correo de quien recibe (nombre opcional de correo a quien copia )
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // agregar fotos archivos 

    // Content
    $mail->isHTML(true);                                  // si usas HTML pones true y si no false
    $mail->Subject = 'Hola, que tal!'.'</br>'.$suscriptor;                 //asunto
    $mail->Body    = $contenido;                            //contenido del messaje
    

    $mail->send();
    echo 1;
} catch (Exception $e) {
    //echo 0;
    echo "Mailer Error: " . $mail->ErrorInfo;
}

//gmail no permite que php entre a tu cuenta asi que tienes que seguir los siguientes pasos
//entras a   tu cuenta de google
//gestionar tu cuenta
//seguridad->  acceso de apps menos seguras->  activado