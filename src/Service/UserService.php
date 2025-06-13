<?php
namespace App\Service;
use Exception;
use App\Interfaces\ValidateUserInterface;
use App\Exception\InvalidUserDataException;

class UserService{
 private ValidateUserInterface $validateUser;//переменную имя измени потом
 private ValidateUserInterface $validatePassword;
 private ValidateUserInterface $validateEmail;

 function register(array $data){
   // валидация данных
   error_log("Доходит");
   //проверка есть ли вообще данные в массиве

   try{
    $this->validateUser->validate($data);
    $this->validatePassword->validate($data); 
    $this->validateEmail->validate($data);
   }catch (Exception $e){
     throw $e;
   }
  }

  function __construct(ValidateUserInterface $validateUser, ValidateUserInterface $validatePassword, ValidateUserInterface $validateEmail){
   $this->validateUser = $validateUser;
   $this->validatePassword = $validatePassword;
   $this->validateEmail = $validateEmail;
  }

}
