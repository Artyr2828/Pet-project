<?php
namespace App\Interfaces;
use Psr\Http\Message\ServerRequestInterface as Request;

interface BodyParserInterface{
 function parse(Request $r): array;
}
