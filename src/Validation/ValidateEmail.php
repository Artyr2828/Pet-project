<?php
namespace App\Validation;
use App\Interfaces\ValidateUserInterface;
use App\Exception\InvalidEmail;
class ValidateEmail implements ValidateUserInterface{

 function validate(string $email){
    //чуть позже должен принимать обьект
    $domen = substr(strrchr($email, '@'), 1);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !checkdnsrr($domen, 'MX')){
       throw new InvalidEmail("Невалидный Email");
    }
  }
}
