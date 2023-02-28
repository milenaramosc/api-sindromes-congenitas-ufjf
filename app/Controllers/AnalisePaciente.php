<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AnalisePaciente extends BaseController
{
    public function create()
    {
        $request = $this->request->getJSON(true);
        $modelAnalisePaciente = model('AnalisePaciente');
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
