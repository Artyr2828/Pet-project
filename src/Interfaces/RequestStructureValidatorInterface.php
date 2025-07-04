<?php
namespace App\Interfaces;
interface RequestStructureValidatorInterface{
   function ValidateDataStructure(array $data, ...$expArg);
}
