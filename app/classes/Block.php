<?php

namespace app\classes;

use app\core\MethodExtract;
use app\interfaces\ControllerInterface;

class Block
{
    /**
     * Summary of getMethodToBlock
     * @param \app\interfaces\ControllerInterface $controllerInterface
     * @param array $blockMethods
     * @return bool
     * Função que vai pegar o controller atual e os métodos que tem que ser bloqueados
     * e de acordo com sua preferência bloquear os métodos.
     */
    public static function getMethodToBlock(ControllerInterface $controllerInterface, array $blockMethods){

        //$blockMethods é o array que recebe os métodos a serem bloqueados
        $methods = get_class_methods($controllerInterface);
        //$methods pega a classe atual

        //Aqui são extraídos os metodos e colocados dentro de um array
        [$actualMethod] = MethodExtract::extract($controllerInterface);

        $blockMethod = false;

        //Assim que chegar no foreach é colocado dentro da função "in_array" que verifica se tem um método de bloqueio dentro do array do ControllerInterface
        //e caso tenha bloqueia o método
        foreach ($methods as $method) {
            if(in_array($method, $blockMethods) and $method === $actualMethod){
                $blockMethod = true;
            }

        }
        return $blockMethod;
     }
}