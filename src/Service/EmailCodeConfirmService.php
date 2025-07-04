<?php
namespace App\Service;
use App\Validation\ValidateEmailCode\ValidateEmailCode;
use Exception;
use App\Exception\InvalidEmailCode;
use App\Interfaces\initDataBaseInterface;

class EmailCodeConfirmService{
  private ValidateEmailCode $validCodeEmail;
  private initDataBaseInterface $initRedis;
  function confirmation(string $emailCodeClient, string $email){
    //вчтавь АРГУМЕНТЫ
    try {
     $redis = $this->initRedis->init();
     $EmailValidCode = $redis->get("codeEmail_" . $email);
     $this->validCodeEmail->validate($emailCodeClient, $EmailValidCode);
    
     
    }
    catch(Exception $e){
      //Перебрасываем исключения к контроллеру
      throw $e;
    }
}
  
  function __construct(ValidateEmailCode $validCodeEmail, initDataBaseInterface $initRedis){
    $this->validCodeEmail = $validCodeEmail;
    $this->initRedis = $initRedis;
  }
}
