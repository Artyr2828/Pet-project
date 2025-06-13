<?php
require __DIR__ . '/vendor/autoload.php';
use Slim\Factory\AppFactory;
use DI\Container;
use App\Interfaces\BodyParserInterface;
use App\BodyParsers\JsonParser;
use App\Midleware\CorsMidleware;
use function DI\autowire;
use App\Service\UserService;
use App\Interfaces\ValidateUserInterface;
use App\Validation\ValidateData;
use App\Interfaces\ResponseInterface;
use App\Response\JsonResponseFormatter;
use App\Validation\ValidatePassword;
use App\Validation\ValidateEmail;
$container = new Container();
$container->set(BodyParserInterface::class, autowire(JsonParser::class));
$container->set(UserService::class, autowire(UserService::class));
$container->set('DataValidate', autowire(ValidateData::class));
$container->set('PasswordValidate', autowire(ValidatePassword::class));
$container->set('EmailValidate', autowire(ValidateEmail::class));

$container->set(UserService::class, function($c){
  return new UserService($c->get('DataValidate'), $c->get('PasswordValidate'), $c->get('EmailValidate'));
});
$container->set(ResponseInterface::class, autowire(JsonResponseFormatter::class));
//$container->set(CorsMidleware::class, CorsMidleware::class);
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->add(CorsMidleware::class);
(require __DIR__ . '/route/web.php')($app);

$app->run();
