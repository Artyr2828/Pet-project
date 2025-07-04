<?php
namespace App\DataBases\addDataInDataBase;
use App\Interfaces\AddDataInRedisInterfaces;
//должен быть интерфейс
class addDataInRedis implements AddDataInRedisInterfaces{
  function add($redis, int $exp,string $nameKey, string $Value){
    $redis->setex($nameKey, $exp, $Value);
  }
}
