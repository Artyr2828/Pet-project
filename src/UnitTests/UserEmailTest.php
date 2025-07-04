<?php
namespace App\UnitTests;
use PHPUnit\Framework\TestCase;
use App\Validation\ValidateEmail;
use App\Exception\InvalidEmail;

class UserEmailTest extends TestCase{
  function testInvalidSyntaxisEmail(){
    $ValEmail = new ValidateEmail();
    
    $this->expectException(InvalidEmail::class);

    $ValEmail->validate("Artyt"); 
   }
  
  function testInvalidDomenEmail(){
    $ValEmail = new ValidateEmail();
    $this->expectException(InvalidEmail::class);
    $ValEmail->validate("Artyt@stoggp.com");
  }

  function testValidSyntaxisEmail(){
    $ValEmail = new ValidateEmail();
    $this->assertSame(null, $ValEmail->validate("Artyr@gmail.com"));
  }

  function testValidDomenEmail(){
      $ValEmail = new ValidateEmail();
      $this->assertSame(null, $ValEmail->validate("Vasa182@gmail.com"));
    }
}
