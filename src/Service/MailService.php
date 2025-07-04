<?php
namespace App\Service;
use App\Mail\MailConfigFactory;
use App\Mail\SetingsMail;
use App\Mail\SettingsMailMsg;
use App\Mail\Mailer;
use App\Interfaces\GenerateEmailCodeInterfaces;
use App\DataBases\init\initRedis;
use App\DataBases\addDataInDataBase\addDataInRedis;
use App\Interfaces\initDataBaseInterface;
use App\Interfaces\AddDataInRedisInterfaces;

use Exception;

class MailService{
  private MailConfigFactory $mail;
  private SetingsMail $settingsMail;
  private SettingsMailMsg $settingsMailMsg;
  private Mailer $sendingMail;
  private GenerateEmailCodeInterfaces $GenerateCodeEmail;
  private initDataBaseInterface $initRedis;
  private AddDataInRedisInterfaces $addInRedis; 
  function EmailConfirmation(string $email){
    error_log("Доходит до ServiceMail");
     $pathHtml = __DIR__ . "/../Views/MessageVerificationEmail.html";
    try{
       $mail = $this->mail->FactoryPHPMailer();
       
       $this->settingsMail->settingsMail($mail);
       $code = $this->GenerateCodeEmail->generate(); 
       $this->settingsMailMsg->MailMsg($mail, "Код Доступа", $pathHtml, $email, $code);
       
       $this->sendingMail->SendMail($mail);
       $redis = $this->initRedis->init();
       $this->addInRedis->add($redis, 60, "codeEmail_" . $email, $code);
       return true;
    }
     catch (Exception $e){
       throw $e;
       return false;
     }
}

  function __construct(MailConfigFactory $MailConfigFactory, SetingsMail $SetingsMail, SettingsMailMsg $SettingsMailMsg, Mailer $SendingMail,GenerateEmailCodeInterfaces $GenerateCodeEmail, initDataBaseInterface $initRedis, AddDataInRedisInterfaces $addDataInRedis){
   $this->mail = $MailConfigFactory;
   $this->settingsMail = $SetingsMail;
   $this->settingsMailMsg = $SettingsMailMsg;
   $this->sendingMail = $SendingMail;
   $this->GenerateCodeEmail  = $GenerateCodeEmail;
   $this->initRedis = $initRedis;
   $this->addInRedis = $addDataInRedis;
}
}
