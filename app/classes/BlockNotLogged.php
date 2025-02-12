<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNotLogged
{
    /**
     * Summary of block
     * @param \app\interfaces\ControllerInterface $controllerInterface
     * @param array $blockMethods
     */
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        //$canBlockMethod
        $canBlockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        //if caso tenha um método que vai ser bloqueado e cai dentro do if ele verifica de a seção do usuário não está vazia e depois bloqueia todo o método que for do tipo POST
        //Depois retorna para o método index
        if (!isset($_SESSION['user']) and $canBlockMethod) {
            BlockPostRequest::block();
            return redirect('/');
        }
    }
}
