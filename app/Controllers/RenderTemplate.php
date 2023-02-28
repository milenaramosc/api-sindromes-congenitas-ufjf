<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RenderTemplate extends BaseController
{
    public function render()
    {

        $data['nome'] = 'João';
        $data['title'] = 'Relatorio-MILENA';
        $data['especialidades'] =
        [
                'Neurologia pediatrica',
                'Neurologia adulto',
                'Genetica academica',
            
        ];
        return view('relatorio', $data);
    }
}
