<?php
namespace App\Validation;
use App\Interfaces\ValidateUserInterface;
use App\Exception\InvalidEmail;
class ValidateEmail implements ValidateUserInterface{

 function validate(array $data){
    //чуть позже должен принимать обьект
    $email = $data['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
       throw new InvalidEmail("Невалидный Email");
    }
  }
}
