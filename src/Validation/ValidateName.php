<?php
namespace App\Validation;
use App\Interfaces\ValidateUserInterface;
use App\Exception\InvalidNameLength;
use App\Exception\InvalidCharactersInName;

class ValidateName implements ValidateUserInterface{
  function validate(string $name){
      if (mb_strlen($name) < 3){
         throw new InvalidNameLength("Длинна имени должна быть не меньше 3 символов");
       }
      if (!preg_match('/^[a-zA-Zа-яА-Я]+$/u', $name)){
          throw new InvalidCharactersInName("Имя не должно содержать символы");
      }
  }
}
