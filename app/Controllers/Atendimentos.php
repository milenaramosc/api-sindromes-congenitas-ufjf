<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Atendimentos extends BaseController
{
    public function create()
    {
        $request = $this->request->getJSON(true);
        // $this->request->getGet();
        // $this->request->getVar();
        $ip = $this->request->getIPAddress();
        $modelAtendimento = model('Atendimentos');
        $modelAtendimento->insert([...$request, "ip" => $ip]);
        $erros = $modelAtendimento->errors();
        if ($erros) {
            return $this->response->setJSON([
                'errors' => $erros,
                'mensagem' => 'Campos invalidos'
            ])->setStatusCode(400);
        }
    }
    public function get()
    {
        $ip = $this->request->getGet('ip');

        $model = model('Atendimentos');
        $response = $model->getWhere([
            'ip' => $ip
        ])->getRowArray(); // getRowArray() getResultArray

        return $this->response->setJSON([
            'mensagem' => 'Dados listados com sucesso',
            'payload' => $response
        ]);
    }
}
