<?php
namespace App\Response;
use Psr\Http\Message\ResponseInterface as Response;
use App\Interfaces\ResponseInterface;

class JsonResponseFormatter implements ResponseInterface{
 function formatter(Response $w, array $jsonResp, int $Status, string $StatusStr){
    $w->getBody()->write(json_encode($jsonResp, JSON_UNESCAPED_UNICODE));
    return $w->withHeader("Content-Type", "application/json")
    ->withStatus($Status, $StatusStr);
 }
}
