<?php

namespace app\core;

use Throwable;

class ControllerExtract
{
    public static function extract()
    {
        $uri = Uri::uri();

        $folder = FolderExtract::extract();

        //Verificação para saber se o controller está no indice [1].
        if ($folder) {
            //Se a pasta existir, vai pegar a partir do indice 1, se não vai pegar o 0.
            $controller = Uri::uriExist($uri, 1);
            $namespaceAndController = "app\\controllers\\".$folder."\\";
        } else {
            $controller = Uri::uriExist($uri, 0);
            $namespaceAndController = "app\\controllers\\";
        }


        if (!$controller) {
            $controller = CONTROLLER_DEFAULT;
        }

        $controller = $namespaceAndController.$controller;

        if (class_exists($controller)) {
            return $controller;
        }
        throw new \Exception("Controller {$controller} não existe");

    }
}
