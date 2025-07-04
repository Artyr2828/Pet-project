<?php
use App\Controllers\RegistrationController;
use Slim\App;
return function(App $app){
    $app->post('/', RegistrationController::class . ':handlerPost');
    $app->post('/check-code', RegistrationController::class . ':checkCodeEmailPost');
    $app->post('/resendEmailCode', RegistrationController::class . ':resendEmailCodePost');
    $app->get('/', RegistrationController::class . ':handlerGet');
  //  $app->post('/', RegistrationController::class . ':handlerPost');
};
