<?php
namespace App\DataBases\init;
use App\Interfaces\initDataBaseInterface;
use Predis\Client;
use Exception;
class initRedis implements initDataBaseInterface{
  function init(){
    
    error_log("до инициализции доходит");
    $redis = new Client([
       'scheme' => 'tcp',
        'host' => '127.0.0.1',
        'port' => 6379,
    ]);
   // $resp = $redis->ping();
    //error_log((string)$resp);
 
    return $redis;
    }
}
