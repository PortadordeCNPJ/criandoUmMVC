<?php

namespace app\classes;

class Flash
{
    /**
     * Summary of set
     * @param mixed $key
     * @param mixed $message
     * @param mixed $alert
     * @return void
     * Função de set que passa a $key, a $message que vai ser passada para o usuário, 
     */
    public static function set($key, $message, $alert = 'danger')
    {
        if(!isset($_SESSION['messages'][$key])){
            $_SESSION['messages'][$key] = [
                'message' => $message,
                'alert' => $alert
            ];
        }
    }

    /**
     * Summary of get
     * @param mixed $key
     * Função de get que recebe a $key que é a palavra definida para executar a mensagem
     */
    public static function get($key)
    {
        if(isset($_SESSION['messages'][$key])){
            $flash = $_SESSION['messages'][$key];
            unset($_SESSION['messages'][$key]);

            return $flash;
        } 
    }
}