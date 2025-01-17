<?php

namespace app\controllers;

class Product {

    public $data = [];
    public string $view;

    public function index(array $args){
        // var_dump($args[1]);
    }

    public function edit(array $args){
        $this->view = "edit";
        $this->data = [
            'title' => 'Edit'
        ];
    }
}