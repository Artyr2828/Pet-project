<?php
namespace App\Validation;
use App\Exception\InvalidUserDataException;
use App\Interfaces\RequestStructureValidatorInterface;

use App\DTO\UserData;
class ValidateData implements RequestStructureValidatorInterface{
  function ValidateDataStructure(array $data, ...$expArg){
 //отбрасываем сразу если есть лишние или недостающ. аргументы
    //if (count($data) !== count($expArg)){
     //временно только для проверки
      //throw new InvalidUserDataException("недостаток нужных данных");
    //}
    foreach ($expArg as $index => $value){
       error_log($value);
       if (!isset($data[$value])){
          throw new InvalidUserDataException("инвалидные данные");
          }
    }
     
  } 
}
