<?php
namespace App\Validation\ValidateEmailCode;
use App\Exception\InvalidEmailCode;
class ValidateEmailCode{
  function validate(string $codeEmailClient, ?string $codeEmail){
    if ($codeEmail === null){
       throw new InvalidEmailCode("срок кода истек, требуется повторить регистрацию или запросить новый код");
     }
    if ($codeEmailClient !== $codeEmail){
       throw new InvalidEmailCode("Невалидный Email код");    
    }
  } 
}
