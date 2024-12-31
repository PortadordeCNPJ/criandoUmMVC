<?php

namespace app\models\connection;

use PDO;
use PDOException;

class Connection
{
    //Deixando a variável que vai ser usada na conexão com o banco estática e privada
    private static $pdo = null;

    //Função para fazer conexão com o banco de dados
    public static function connect()
    {
        try {
            //Verifica se a conexão não foi estática e caso não seja ele transforma ela e atribui as informações de conexão
            if (!static::$pdo) {
                static::$pdo = new PDO("mysql:host=localhost;dbname=cursoactiverecord","root","", [

                    //Quando ocorre algum erro, ele mostra eles como exceção, mostrando o erro que está ocorrendo
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    //Serve para trabalhar com objetos, como ex: $userFirstName->updateUser();
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);

                //Retorna a conexão com banco
                return static::$pdo;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
