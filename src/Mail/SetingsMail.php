<?php
namespace App\Mail;

class SetingsMail{
  function settingsMail($mail){
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "hik144444ih33@gmail.com";
    $mail->Password = "gpuxqmtwbnpyfvxz";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
  }
}
