<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\BodyParsers\JsonParser;
use App\Interfaces\BodyParserInterface;
use App\DTO\UserData;
use Exception;
use App\Service\UserService;
use App\Interfaces\ResponseInterface;
use App\Service\MailService;
use App\Service\EmailCodeConfirmService;
use App\Validation\ValidateEmailCode\ValidateEmailCode;

use App\Interfaces\RequestStructureValidatorInterface;

class RegistrationController{
 private BodyParserInterface $parser;
 private UserService $userService;
 private ResponseInterface $responseInterface;
 private MailService $mailService;
 private ValidateEmailCode $validateEmailCode; 
 private RequestStructureValidatorInterface $structValid;
 private EmailCodeConfirmService $emailConfirmService;
 public function handlerGet(Request $r, Response $w, $args){
    $w->getBody()->write("HelooGet");

    return $w;
  }
//Post запрос регистрации
 public function handlerPost(Request $r, Response $w, $args){
    
    try{
      $data = $this->parser->parse($r);
      //валидация пришедших данных(может выбросить исключения)
      $this->structValid->ValidateDataStructure($data, "name", "email", "password");
      $user = new UserData($data["name"], $data["password"], $data["email"]);

      $this->userService->register($user);
      $this->mailService->EmailConfirmation($user->email);

       //Ответ
      return $this->responseInterface->formatter($w, ["Statys"=>"Ok"], 200,"Ok, Work!");

    } catch (Exception $e){
      return $this->responseInterface->formatter($w, ["Error"=>$e->getMessage()], 422, "error");
} 
  
}
//Post запрос проверки кода
public function checkCodeEmailPost(Request $r, Response $w, $args){
   
  try{
    $data = $this->parser->parse($r);
    $this->structValid->ValidateDataStructure($data, "Email_Code", "email");
    
    $this->emailConfirmService->confirmation($data["Email_Code"], $data["email"]);

    //Возрат ответа
    return $this->responseInterface->formatter($w, ["Status"=>"Ok"],200,"Work!");
  }
  catch (Exception $e){
    return $this->responseInterface->formatter($w, ["Error"=>"" . $e->getMessage()], 422, "" . $e->getMessage());
}

}

//Post запрос для повторной отправки кода 
function resendEmailCodePost(Request $r, Response $w, $args){
  try{
   $data = $this->parser->parse($r);
   $this->structValid->ValidateDataStructure($data, "email");
   $this->mailService->EmailConfirmation($data["email"]);

    //Ответ
   return $this->responseInterface->formatter($w, ["Status"=>"Ok"],200,"Work!");
  }
  catch(Exception $e){
    return $this->responseInterface->formatter($w, ["Error"=>"" . $e->getMessage()], 500, "" . $e->getMessage());
  }
}

  function __construct(BodyParserInterface $parser, UserService $userService, ResponseInterface $responseInterface, MailService $mailService, RequestStructureValidatorInterface $structValid, EmailCodeConfirmService $emailConfirmService){
      $this->parser = $parser;
      $this->userService = $userService;
      $this->responseInterface = $responseInterface;
      $this->mailService = $mailService;
      $this->structValid = $structValid;
      $this->emailConfirmService = $emailConfirmService;
  }
}
