<?php

use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


return function(App $app){
  (require __DIR__ . "/auth.php")($app);
};
