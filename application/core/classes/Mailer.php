<?php

class Mailer
{
    public static function send($recipient, $subject, $body, $altBody)
    {
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                                         // Enable verbose debug output

        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host = App::get('config')['mailer']['host'];             // Specify main and backup SMTP servers
        $mail->SMTPAuth = App::get('config')['mailer']['smtpauth'];     // Enable SMTP authentication
        $mail->Username = App::get('config')['mailer']['username'];     // SMTP username
        $mail->Password = App::get('config')['mailer']['password'];     // SMTP password
        $mail->SMTPSecure = App::get('config')['mailer']['smtpsecure']; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = App::get('config')['mailer']['port'];             // TCP port to connect to

        $mail->setFrom(App::get('config')['mailer']['setfrom']);        // Afsender adresse
        $mail->addAddress($recipient);                                  // Modtager adresse
        $mail->addReplyTo(App::get('config')['mailer']['addreplyto']);  // Svar adresse, (svar navn)
        $mail->isHTML(true);                                            // Sæt email format til HTML

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        $mail->send() ? true : false;
    }
}