<?php
namespace App\BodyParsers;
use App\DTO\UserData;
use Psr\Http\Message\ServerRequestInterface as Request;
use InvalidArgumentException;
use App\Interfaces\BodyParserInterface;

class JsonParser implements BodyParserInterface{
  function parse(Request $r): array{
     $bodyStr = $r->getBody()->getContents();
     $data = json_decode($bodyStr, true);  
     if (json_last_error() !== JSON_ERROR_NONE){
       throw new InvalidArgumentException('Положили не те данные');
     }
    // $user = new UserData($data["name"],$data["password"], $data["email"]);
     return $data;
  }
}
