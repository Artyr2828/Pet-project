<?php
namespace App\UnitTests;
use App\Validation\ValidatePassword;
use PHPUnit\Framework\TestCase;
use App\Exception\InvalidPasswordLength;
use App\Exception\InvalidExtraCharacters;
use Exception;

//$Password = new ValidatePassword();
class UserPasswordTest extends TestCase{
   
  //Отрицательный тесты
  //Проверка Короткости пароля
  function testShortPasswordLengtchException(){
    $Password = new ValidatePassword();
     $this->expectException(InvalidPasswordLength::class);

     $Password->validate("");
     }

  function testSimvolsPasswordException(){
    $Password = new ValidatePassword();
    $this->expectException(InvalidExtraCharacters::class);

    $Password->validate("nsnsjakKkkww99sjjs>jwj");
  }
  //Положительные тесты
  function testShortPasswordLengtchValid(){
    $Password = new ValidatePassword();
    //$Password->validate("ValidatePassword");
    $this->assertSame(null, $Password->validate("ValidatePassword829"));
  }
  
  function testSimvolsValid():void{
    $Password = new ValidatePassword();
    //$Password->validate("ValidatePassword829");
    $this->assertSame(null, $Password->validate("ValidatePassword829"));
  }
}
