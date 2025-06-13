<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\BodyParsers\JsonParser;
use App\Interfaces\BodyParserInterface;
use App\DTO\UserData;
use Exception;
use App\Exception\InvalidUserDataException;
use App\Service\UserService;
use App\Interfaces\ResponseInterface;

class RegistrationController{
 private BodyParserInterface $parser;
 private UserService $userService;
 private ResponseInterface $responseInterface;

 public function handlerGet(Request $r, Response $w, $args){
    $w->getBody()->write("HelooGet");

    return $w;
  }

 public function handlerPost(Request $r, Response $w, $args){
    try{
      $data = $this->parser->parse($r);
      $this->userService->register($data);
      $w->getBody()->write(json_encode(["Statys"=>"Ok"]));
      return $w->withHeader("Content-Type", "application/json")
      ->withStatus(200, "Ok");

    } catch (Exception $e){
       $this->responseInterface->formatter($w, ["Error"=>$e->getMessage()], 400, "error");
}

    return $w->withStatus(400, "ok"); 
  
}


  function __construct(BodyParserInterface $parser, UserService $userService, ResponseInterface $responseInterface){
   $this->parser = $parser;
   $this->userService = $userService;
    $this->responseInterface = $responseInterface;
  }
}
