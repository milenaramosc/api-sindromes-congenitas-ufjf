<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GeoIp2\Database\Reader as Location;

class Atendimentos extends BaseController
{
    public function create()
    {
        $request = $this->request->getJSON(true);

        $reader = new Location(
            GEOIP2_FILE_DATABASE,
            ['pt-BR']
        );
        
        $ip_address = $this->request->getIPAddress() ?? '177.37.126.30';
        $record = $reader->city($ip_address);

        $location = $record->city->name . "," . // exibe o nome da cidade
                    $record->mostSpecificSubdivision->name . "," . // exibe o nome da subdivisão mais específica
                    $record->country->name . "," . // exibe o nome do país
                    $record->continent->name; // exibe o nome do continente

        $modelAtendimento = model('Atendimentos');
        $modelAtendimento->insert([
            'localizacao' => $location,
            'profissao_usuario' => $request['resposta'],
            'ip' => $ip_address
        ]);
        $erros = $modelAtendimento->errors();

        if ($erros) {
            return $this->response->setJSON([
                'errors' => $erros,
                'mensagem' => 'Campos invalidos'
            ])->setStatusCode(400);
        }
        return $this->response->setJSON([
            'payload' => ["id_atendimento" => $modelAtendimento->insertID()],
            'mensagem' => 'Dados inseridos com sucesso'
        ])->setStatusCode(201);
    }
}
