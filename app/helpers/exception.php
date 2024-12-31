<?php

//Função que retorna os erros com mais detalhes
function formatException(Throwable $throw)
{
    var_dump("Erro no arquivo <b>{$throw->getFile()}</b> na linha <b>{$throw->getLine()}</b> com a mensagem <b><i>{$throw->getMessage()}</b></i>");
}
