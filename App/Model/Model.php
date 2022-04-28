<?php

namespace App\Model;

abstract class Model
{

    protected $validation_erros = array();

    
    public function getValidationsErrors(): array
    {
        return $this->validation_erros;
    }


    public function hasValidationsErrors(): bool
    {
        return (count($this->validation_erros) > 0) ? true : false;
    }

}