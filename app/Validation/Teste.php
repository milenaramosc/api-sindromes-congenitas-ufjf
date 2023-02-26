<?php

namespace App\Validation;

class Teste
{
    public function validaIP($ip): bool
    {
        if($ip){
            return true;
        }
        return false;
    }

}