<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNotLogged
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods){
        $blockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        var_dump($blockMethod);
    }
}