<?php
namespace App\Generate;
class GenerateHtmlEmailCode{
   static function generate($code){
      $pathHtml = __DIR__ . "/../Views/MessageVerificationEmail.html";
      str_replace("{{code}}", $code, $pathHtml);
      $strHtml = file_get_contents($pathHtml);
      $strHtml = str_replace("{{code}}", $code, $strHtml);
      return $strHtml;
   }
}
