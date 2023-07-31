<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RenderTemplate extends BaseController
{
    public function render($id_atendimento)
    {
        // exit((string)$id_atendimento);
        $modelAnalisePaciente = model('AnaliseRelatorio');
        $queryResult = $modelAnalisePaciente
                        ->where('fk_atendimento', $id_atendimento) //(int)$id_atendimento 
                        ->get()->getResultArray();
        $data['resposta'] =  $queryResult[0];

        $data['nome'] = 'João';
        $data['title'] = 'Relatorio-MILENA';
        $data['especialidades'] =
        [
                'Neurologia pediátrica',
                'Neurologia adulto',
                'Genética acadêmica',
            
        ];
    //    print_r($data);exit;
        return view('relatorio', $data);
    }
}
