<?php

namespace app\core;

class Uri
{
    public static function uri()
    {
        //$uri evita que sejá passado uma query string como um controller, deixando apenas o nome do controller
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        return explode("/", ltrim($uri, '/'));
    }
}
