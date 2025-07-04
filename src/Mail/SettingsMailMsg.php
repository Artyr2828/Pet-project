<?php
namespace App\Mail;
use App\Generate\GenerateHtmlEmailCode;
use Exception;


class SettingsMailMsg{

  function MailMsg($mail, string $Subject, string $strHtml, string $email, string $code){
    //env файл!
    try{
    //Часть кода
    $mail->setFrom("hik144444ih33@gmail.com", "Хаято");
    $mail->addAddress($email, "Получатель");
    $mail->CharSet = "UTF-8";
    $mail->isHTML(true);
    $mail->Subject = $Subject;
    $strHtml = str_replace("{{code}}", $code, $strHtml);
    $mail->Body = GenerateHtmlEmailCode::generate($code);
    return $code;
   }
    catch (Exception $e){
      return $e;
    }
}
 
}

