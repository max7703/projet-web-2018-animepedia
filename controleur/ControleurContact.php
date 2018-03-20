<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 19/03/2018
 * Time: 23:26
 */

require '../lib/PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['contact-sent']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $fullname = $name . ' ' . $surname;

        $mail = new PHPMailer;
        $mail->setFrom($email, $fullname);
        $mail->addAddress('contact@animepedia.fr', 'Animepedia');
        $mail->Subject  = 'J\'ai un probleme';
        $mail->Body     = $message;
        if(!$mail->send()) {
            $_SESSION['contactError'] = 'Erreur de l\'envoie du mail: ' . $mail->ErrorInfo;
        } else {
            $_SESSION['contactSuccess'] = 'Le message à été envoyé !';
        }
    }
}