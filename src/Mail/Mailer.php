<?php
namespace App\Mail;
require_once __DIR__ . "/../../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{
 function SendMail($mail){
   try{
   $mail->send();
   
   }
    catch (Exception $e){
     error_log($e->getMessage());
   }
}
}
