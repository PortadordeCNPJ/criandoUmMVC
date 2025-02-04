<?php

namespace app\controllers;

use app\classes\Validate;

class SignUp
{
    public $view;
    public array $data = [];

    public function index(array $args)
    {
        $this->view = "signup.php";
        $this->data = [
            'title' => 'Signup'
        ];
    }

    public function store()
    {
        $validate = new Validate();
        $validate->handle([
            'firstName' => [REQUIRED],
            'lastName' => [REQUIRED],
            'email' => [REQUIRED, EMAIL],
            'password' => [REQUIRED, MAXLEN.':10'],
        ]);

        // if($validate->erros){

        // }
    }
}
