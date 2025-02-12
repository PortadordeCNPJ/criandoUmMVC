<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class Validate
{

    public bool $erros = false;
    public array $data = [];

    /**
     * Summary of validateInstance
     * @param string $field
     * @param array $validations
     * @return void
     */
    private function validateInstance(string $field, array $validations)
    {
        foreach ($validations as $classValidate) {
            $namespace = "app\\classes\\";

            $class = $namespace.$classValidate;

            [$class, $param] = $this->classWithColon($class);

            if (class_exists($class)) {
               $this->data[$field] = $this->executeClass(new $class, $field, $param);
            } 
        }
    }

    /*Essa função passa $class como parametro e se não tiver ":", dentro do array
        ela retorna novamente a $class, sem entrar dentro do if*/
    private function classWithColon($class)
    {
        $param = null;
        if (str_contains($class, ":")) {
            [$class, $param] = explode(':', $class);

        }
        return [$class, $param];
    }

    public function handle(array $validations)
    {
        foreach ($validations as $field => $validation) {

            $this->validateInstance($field, $validation);
        }

        if(in_array(false, $this->data)){
            $this->erros = true;
        }
    }

    private function executeClass(ValidateInterface $validateInterface, $field, $param) {
        return $validateInterface->handle($field, $param);
    }
}
