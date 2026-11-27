<?php

namespace app\controllers\site;

use app\interfaces\ControllerInterface;

class Home implements ControllerInterface
{

    public function index(array $args) 
    {
        var_dump('Home');
        die();
    }

    public function store() {}

    public function destroy(array $args) {}

    public function edit(array $args) {}
    public function show(array $args) {}
    public function update(array $args) {}
}
