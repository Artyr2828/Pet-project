<?php
namespace App\Validation;
use App\Exception\InvalidPasswordLength;
use App\Exception\InvalidExtraCharacters;
use App\Interfaces\ValidateUserInterface;

class ValidatePassword implements ValidateUserInterface{
  function validate(string $password){
    
//Ошибка здесь
    if (mb_strlen($password) < 12){
        throw new InvalidPasswordLength("Длинна пароля должна быть больше 11");
    }
    if (preg_match("/[а-яА-ЯёЁ,√π÷×§∆~><]/u", $password) === 1){
      throw new InvalidExtraCharacters("В пароле не должно быть кирилицы и некоторых специальных символов");
    }
  }
}

