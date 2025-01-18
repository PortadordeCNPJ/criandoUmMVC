<?php

namespace app\controllers;

use app\models\User as UserModel;
use app\models\activerecord\FindBY;
use Exception;

class User
{
    public $view;
    public array $data = [];

    public function show(array $args) 
    {
        $user = (new UserModel)->execute(new FindBY(field: 'id', value:$args[0], fields:'id, firstName, lastName'));
        if (!$user) {
            throw new Exception('Usuário não encontrado');
        }

        $this->view = "user.php";
        $this->data = [
            'title' => 'Dados do user',
            'user' => $user
        ];
    }
}