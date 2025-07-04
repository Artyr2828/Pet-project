<?php
namespace App\Mail;
use PHPMailer\PHPMailer\PHPMailer;
class MailConfigFactory{
   public function FactoryPHPMailer(){
      return new PHPMailer();
   }
}
