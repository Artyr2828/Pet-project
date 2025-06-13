<?php
namespace App\Interfaces;
use Psr\Http\Message\ResponseInterface as Response;
interface ResponseInterface{
  public function formatter(Response $w, array $Resp, int $Status, string $StatusStr);
}
