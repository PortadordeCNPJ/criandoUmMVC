<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;

class Home implements ControllerInterface
{
    public $data = [];
    public string $view; 


    function destroy(array $args){

    }
    function edit(array $args){

    }
    function index(array $args){
        $this->data = [
            'title' => 'Admin'
        ];
        $this->view = 'admin/home.php';
    }
    function show(array $args){

    }
    function store(){

    }
    function update(array $args){

    }
}
