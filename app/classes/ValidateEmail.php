<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateEmail implements ValidateInterface
{
    public function handle($field, $param)
    {
        $isEmail = filter_input(INPUT_POST,$field, FILTER_VALIDATE_EMAIL);

        if (!$isEmail) {
            Flash::set($field, 'Esse campo tem que ser um email');
            return false;
        }

        return filter_input(INPUT_POST,$field, FILTER_VALIDATE_EMAIL);
    }
}