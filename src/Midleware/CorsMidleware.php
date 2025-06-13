<?php
namespace App\Midleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
//use Psr\Http\Message\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface as Response;

class CorsMidleware{
 function __invoke(Request $r, Handler $handler){
     
     error_log("Stop");
      if ($r->getMethod() === 'OPTIONS'){
	  $ResponseFactory = new \Slim\Psr7\Factory\ResponseFactory();
       error_log("Запрос к Options"); 
	 return $ResponseFactory->createResponse(200)
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
	     ->withHeader('Access-Control-Allow-Headers', 'Content-Type');
     error_log("Запрос к Options");
       }
    $nextResponse = $handler->handle($r);
    
    return $nextResponse
     ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Content-Type');
    }
}
 

