<?php

namespace app\controllers;

class Product {

    public $data = [];
    public string $view;

    public function index(array $args){
        var_dump($args);
        $this->view = "edit.php";
        $this->data = [
            'title' => 'Edit'
        ];
    }

    public function edit(array $args){
        
        var_dump($args);
        $this->view = "edit.php";
        $this->data = [
            'title' => 'Edit'
        ];
    }
}