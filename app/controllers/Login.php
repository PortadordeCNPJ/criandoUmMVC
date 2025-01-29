<?php

namespace app\controllers;

use app\models\User;
use app\classes\Flash;
use app\core\MethodExtract;
use app\classes\BlockNoReason;
use app\classes\BlockNotLogged;
use app\models\activerecord\FindBY;
use app\interfaces\ControllerInterface;

class Login implements ControllerInterface
{
    public $view;
    public array $data = [];

    public function __construct()
    {
        BlockNoReason::block($this, ['store']);
    }

    public function index(array $args)
    {
        $this->view = "login.php";
        $this->data = [
            'title' => 'login'
        ];
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $user = new User;
        $userFound = $user->execute(new FindBY(field: 'email', value: $email, fields: 'firstName, lastName, password'));

        if (!$userFound) {
            Flash::set('login', 'Usuário ou senha inválidos');
            return redirect("/login");
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $passwordMatch = password_verify($password, $passwordHash);

        if (!$passwordMatch) {
            Flash::set('login', 'Usuário ou senha inválidos');
            return redirect("/login");
        }

        unset($userFound->password);

        $_SESSION['user'] = $userFound;

        return redirect('/');
    }

    public function destroy(array $args)
    {
        unset($_SESSION['user']);

        return redirect('/');
    }

    public function edit(array $args)
    {

    }
    public function show(array $args)
    {
        
    }
    public function update(array $args)
    {
        
    }
}
