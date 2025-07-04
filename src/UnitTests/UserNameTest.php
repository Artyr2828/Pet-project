<?php
namespace App\UnitTests;
use PHPUnit\Framework\TestCase;
use App\Validation\ValidateName;
use App\Exception\InvalidCharactersInName;
use App\Exception\InvalidNameLength;
class UserNameTest extends TestCase{
  //отрицательные тесты
  function testLengthNameException(){
    $ValName = new ValidateName();
    $this->expectException(InvalidNameLength::class);

    $ValName->validate("A");
  }

  function testSimvolsNameException(){
    $ValName = new ValidateName();
    $this->expectException(InvalidCharactersInName::class);
    
    $ValName->validate("Artyr><}");
  }

   //Положительные тесты
   function testLengthNameValid(){
      $ValName = new ValidateName();
      $this->assertSame(null, $ValName->validate("Artyr"));
    }
  
   function testSimvolsNameValid(){
      $ValName = new ValidateName();
      $this->assertSame(null, $ValName->validate("ArtyrSimvolsNo"));   
   }
}
