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
use App\Validation\ValidateName;
use App\Service\MailService;
use App\Mail\MailConfigFactory;
use App\Mail\SetingsMail;
use App\Mail\SettingsMailMsg;
use App\Mail\Mailer;
use App\Interfaces\RequestStructureValidatorInterface;
use App\Interfaces\GenerateEmailCodeInterfaces;
use App\Generate\GenerateEmailCode;
use App\Interfaces\initDataBaseInterface;
use App\DataBases\init\initRedis;
use App\Interfaces\AddDataInRedisInterfaces;
use App\DataBases\addDataInDataBase\addDataInRedis;
use App\Service\EmailCodeConfirmService;
$container = new Container();
$container->set(BodyParserInterface::class, autowire(JsonParser::class));
$container->set(UserService::class, autowire(UserService::class));
$container->set(RequestStructureValidatorInterface::class, autowire(ValidateData::class));
$container->set('PasswordValidate', autowire(ValidatePassword::class));
$container->set('EmailValidate', autowire(ValidateEmail::class));
$container->set('NameValidate', autowire(ValidateName::class));
$container->set('RedisDB', autowire(initRedis::class));
$container->set(AddDataInRedisInterfaces::class, autowire(addDataInRedis::class));
$container->set(UserService::class, function($c){
  return new UserService($c->get('PasswordValidate'), $c->get('EmailValidate'), $c->get('NameValidate'));
});

$container->set(ResponseInterface::class, autowire(JsonResponseFormatter::class));

$container->set(MailConfigFactory::class, autowire(MailConfigFactory::class));
$container->set(SetingsMail::class, autowire(SetingsMail::class));
$container->set(SettingsMailMsg::class, autowire(SettingsMailMsg::class));
$container->set(Mailer::class, autowire(Mailer::class));
$container->set(initDataBaseInterface::class, autowire(initRedis::class));
//$container->set(GenerateEmailCodeInterfaces::class, GenerateEmailCode::class);
$container->set(RequestStructureValidatorInterface::class, autowire(ValidateData::class));

$container->set(GenerateEmailCodeInterfaces::class, autowire(GenerateEmailCode::class));
$container->set(EmailCodeConfirmService::class, autowire(EmailCodeConfirmService::class));
//$container->set(CorsMidleware::class, CorsMidleware::class);
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->add(CorsMidleware::class);
(require __DIR__ . '/route/web.php')($app);

$app->run();
