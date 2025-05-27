<?php

namespace app\core;

class ControllerExtract
{
    public static function extract() 
    {
        $uri = Uri::uri();

        $controller = "Home";

        $folderExist = FolderExtract::extract();
        var_dump($folderExist);
        die();

        if (isset($uri[0]) and $uri[0] !== '') {
            $controller = ucfirst($uri[0]);
        }

        $namespaceAndController = "app\\controllers\\" . $controller;

        if (class_exists($namespaceAndController)) {
            $controller = $namespaceAndController;
        }

        return $controller;
    }
}
