<?php

namespace app\models\activerecord;

use app\models\connection\Connection;
use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;



class Update implements ActiveRecordExecuteInterface
{

    //Deixa os atributos $field e $value privados, para serem utilizados panas dentro da função
    public function __construct(private string $field, private string|int $value) {}

    //Função retorna os atributos para dentro de um array, para a variável $attributes que depois é executada dentro da função "createQuery", que faz o Update 
    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        //"update users set firstName =:firstName, lastName = :lastName where id = :id";

        try {
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $attributes = array_merge($activeRecordInterface->getAttributes(), [
                $this->field => $this->value
            ]);

            $prepare = $connection->prepare($query);
            $prepare->execute($attributes);
            return $prepare->rowCount();
        } catch (\Throwable $throw) {
            formatException($throw);
        }
    }

    //Função privada que faz o tratamento dos dados e cria o SQL para o Update
    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        //Caso seja tentado passar um id para o Update, ele retona esse erro
        if(array_key_exists('id', $activeRecordInterface->getAttributes())) {
            throw new \Exception('O campo id não pode ser passado para o campo Update');
        }

        $sql = "update {$activeRecordInterface->getTable()} set ";


        foreach ($activeRecordInterface->getAttributes() as $key => $value) {
            $sql .= "{$key}=:{$key}, ";
        }

        //rtrim tira a vírgula do lado direito do sql
        $sql = rtrim($sql, ', ');
        $sql .= " where {$this->field} = :{$this->field}";

        // var_dump($sql);
        return $sql;
    }
}
