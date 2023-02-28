<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AnalisePaciente extends BaseController
{
    public function insert()
    {
        $request = $this->request->getJSON(true);
        // return $this->response->setJSON($request);
        $modelAnalisePaciente = model('AnalisePaciente');
        $request['fk_atendimento'] = $request['id_atendimento'];
        $modelAnalisePaciente->insert($request);
        $erros = $modelAnalisePaciente->errors();
        if ($erros) {
            return $this->response->setJSON([
                'errors' => $erros,
                'mensagem' => 'Campos invalidos'
            ])->setStatusCode(400);
        }
        return $this->response->setJSON([
            'mensagem' => 'Dados inseridos com sucesso'
        ])->setStatusCode(201);
    }
}
