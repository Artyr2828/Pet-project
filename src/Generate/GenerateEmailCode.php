<?php
namespace App\Generate;
use App\Interfaces\GenerateEmailCodeInterfaces;

class GenerateEmailCode implements GenerateEmailCodeInterfaces{
  function generate(){
    return random_int(1000, 9999);
  }
}
