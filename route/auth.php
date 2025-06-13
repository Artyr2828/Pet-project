<?php
use App\Controllers\RegistrationController;
use Slim\App;
return function(App $app){
    $app->post('/', RegistrationController::class . ':handlerPost');
    $app->get('/', RegistrationController::class . ':handlerGet');
  //  $app->post('/', RegistrationController::class . ':handlerPost');
};
