<?php

namespace app\interfaces;

use app\interfaces\ActiveRecordExecuteInterface;

interface ActiveRecordInterface
{
    public function execute(ActiveRecordExecuteInterface $activeRecordExecuteInterface);
    public function __set($attribute, $value);
    public function __get($attribute);
    public function getTable();
    public function getAttributes();
}
