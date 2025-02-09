<?php

namespace app\controllers;

use app\classes\Flash;
use app\models\User;
use app\classes\Validate;
use app\models\activerecord\Insert;

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
            'password' => [REQUIRED, MAXLEN . ':5'],
        ]);

        if ($validate->erros) {
            return redirect('/signup');
        }

        $user = new User;
        $user->firstName = $validate->data['firstName'];
        $user->lastName = $validate->data['lastName'];
        $user->email = $validate->data['email'];
        $user->password = password_hash($validate->data['password'], PASSWORD_DEFAULT);
        $created = $user->execute(new Insert);

        if ($created) {
            Flash::set('created','Cadastrado com sucesso', 'success');
            return redirect('/signup');
        }
    }
}
