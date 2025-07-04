<?php
namespace App\DataBases\init;

require_once __DIR__ . "/../../../vendor/autoload.php";
use PDO;
use PDOException;

class initPostgreSql{
  function init(){
   try{
    $dsn = "pgsql:host=localhost;port=5432;dbname=db";
    $pdo = new PDO($dsn, "postgres");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  }
   catch(PDOException $e){
    throw $e;
  }

}
}

$psql = new initPostgreSql();
$psql->init();
