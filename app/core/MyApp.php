<?php

namespace app\core;

use Exception;
use app\interfaces\AppInterface;

class MyApp
{
    private $controller;

    public function __construct(private AppInterface $appInterface) {}

    public function controller()
    {
        $controller = $this->appInterface->controller();
        $method = $this->appInterface->method($controller);
        $params = $this->appInterface->params();

        $this->controller = new $controller;
        $this->controller->$method($params);
    }

    public function view()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            if (!isset($this->controller->data)) {
                throw new Exception("A propriedade data é obrigatória");
            }

            if (!array_key_exists("title", $this->controller->data)) {
                throw new Exception("A propriedade title é obrigatória em data");
            }

            extract($this->controller->data);
            require "../app/views/index.php";
        }
    }
}
