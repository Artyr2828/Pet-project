<?php
namespace App\UnitTests;
use PHPUnit\Framework\TestCase;
use App\Validation\ValidateEmailCode\ValidateEmailCode;
use App\Exception\InvalidEmailCode;
class EmailCodeTest extends TestCase{
  function testInvalidClientCode(){
     $validate = new ValidateEmailCode();
     $this->expectException(InvalidEmailCode::class);

     $validate->validate("7777", "0000");
     
  }

   function testNullInEmailCode(){
     $validate = new ValidateEmailCode();
     $this->expectException(InvalidEmailCode::class);
     
     $validate->validate("7777", null);
   }
}
