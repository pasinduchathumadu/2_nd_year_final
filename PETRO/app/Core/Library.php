<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/Exception.php';
require 'PHPMailer-master/PHPMailer.php';
require 'PHPMailer-master/SMTP.php';

class Library {
  public function send_Mail($data){
    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    //$mail->Host       = "smtp.mail.yahoo.com";
    $mail->Username   = "pasindugura123@gmail.com";
    $mail->Password   = "afaahgbqayzugiiw";

    $mail->IsHTML(true);
    $mail->AddAddress($data['recipient'], $data['recipient']);
    $mail->SetFrom("pasindugura123@gmail.com", "PETRO");
    //$mail->AddReplyTo("reply-to-email", "reply-to-name");
    //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
    $mail->Subject = $data['subject'];
    $content = $data['message'];

    $mail->msgHTML($content); 
    if(!$mail->Send()) {
    return false;
    } else {
    return true;
    }

  }

}