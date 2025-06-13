<?php
namespace App\Validation;
use App\Exception\InvalidUserDataException;
use App\Interfaces\ValidateUserInterface;
class ValidateData implements ValidateUserInterface{
  function validate(array $data){
    if (!isset($data["name"]) || !isset($data["password"]) || !isset($data["email"])){
        throw new InvalidUserDataException("отсутствует имя или пароль или емэйл");
     }
  } 
}
