<?php

namespace app\models\activerecord;

use ReflectionClass;
use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;



//Não é possível instanciar essa classe em lugar nenhum, pois ela é abstrata
abstract class ActiveRecord implements ActiveRecordInterface
{
    //tabela que será enviada de dentro das classes dos Models
    protected $table = null;

    protected $attributes = [];

    /*Dentro dessa função, vai ser chamado $table e se ela não estiver sendo chamada como método protect, 
    quer dizer que ela não sendo chamada assim caindo dentro do if e verificando se é nula ou não*/
    public function __construct()
    {
        if (!$this->table) {
            //O "$this" dentro de ReflectionClass, faz referência a classe User
            //Pega o nome da classe e coloca como nome da tabela, caso ela não esteja sendo puxada de lugar nenhum
            $this->table = strtolower((new ReflectionClass($this))->getShortName());
        }
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    //__set é um metodo mágico usado para escrever em dados protegidos ou privados e que não existe propriedades
    public function __set($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    //Vai ser usado para ler e obter os $attributes, __get é usado para ler dados protegidos ou privados
    public function __get($attribute)
    {
        return $this->attributes[$attribute];
    }

    //Função para chamar o método que vai fazer o executar todas as interfaces da interface principal
    public function execute(ActiveRecordExecuteInterface $activeRecordExecuteInterface)
    {
        return $activeRecordExecuteInterface->execute($this);
    }

}
