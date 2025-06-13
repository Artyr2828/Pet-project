<?php
namespace App\DTO;
use Exception;
use InvalidArgumentException;
use App\Exception\InvalidUserDataException;


class UserData{
 public string $name;
 public string $password;
 public string $email;

 function __construct(string $name, string $password, string $email){
  error_log("В узер попадает");
   if (empty($name) || empty($password) || empty($email)){
       error_log("В узер попадает");
       throw new InvalidArgumentException("есть пустые поля");
   } 
  $this->name = $name;
   $this->password = $password;
   $this->email = $email;
 }
}
