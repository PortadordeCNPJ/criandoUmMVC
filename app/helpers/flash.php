<?php

use app\classes\Flash;

/**
 * Summary of flash
 * @param mixed $key
 * @return string
 */
function flash($key)
{
    //Recebendo a chave e passando para a função que retona a mensagem
    $flash = Flash::get($key);
    //E caso $flash tenha uma mensagem setada, ai executa o return com a mensagem e o alerta
    if(isset($flash['message'])) {
        return "<span class='alert alert-{$flash['alert']}'>{$flash['message']}</span>";
    }
}   