<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateMaxlen implements ValidateInterface
{ 
    public function handle($field, $param){
        return "ola";
    }
}