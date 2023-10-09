<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RenderTemplate extends BaseController
{
    public function render($id_atendimento)
    {

        $modelEspecialidadeMedica = model('EspecialidadeMedica');

        $query = $modelEspecialidadeMedica
        ->select('em.nome_especialidade, s.nome_sintoma, s.descricao_sintoma')
        ->join('associa_sintoma_espec_med as asem', 'em.id_especialidade = asem.fk_espec_med', 'INNER')
        ->join('sintoma as s', 'asem.fk_sintoma = s.id_sintoma', 'INNER')
        ->join('analise_paciente as ap', 's.id_sintoma IN (
            ap.desenv_cefalico, ap.form_olho, ap.form_pescoco,
            ap.form_coluna, ap.form_mao_pe, ap.form_labio_palato,
            ap.caracteristica_lingua, ap.form_orelha, ap.hist_cardiopatico,
            ap.idade_materna, ap.idade_paterna, ap.aquisicao_linguagem,
            ap.atraso_neuropsicomotor, ap.desenv_extremidade
        )', 'INNER', false)
        ->where('ap.fk_adentimento', $id_atendimento)
        ->groupBy('em.nome_especialidade, s.nome_sintoma, s.descricao_sintoma')
        ->get();

        $queryResult = $query->getResultArray();
      
        $data['resposta'] =  array_unique(array_column($queryResult, 'nome_sintoma'));

        $data['title'] = 'Relatorio';
        $data['especialidades'] = array_unique(array_column($queryResult, 'nome_especialidade'));
        return view('relatorio', $data);
    }
}
