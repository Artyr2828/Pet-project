<?php
namespace App\Interfaces;
use Predis\Client;
interface AddDataInRedisInterfaces{
 public function add(Client $redis, int $ttl, string $NameKey, string $ValueKey);
}
