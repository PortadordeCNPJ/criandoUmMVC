<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNoReason
{
    /**
     * Summary of block
     * @param \app\interfaces\ControllerInterface $controllerInterface
     * @param array $blockMethods
     */
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $canBlockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        //if caso tenha um método que vai ser bloqueado e cai dentro do if
        if ($canBlockMethod) {
            BlockPostRequest::block();
            return redirect('/');
        }
    }
}
