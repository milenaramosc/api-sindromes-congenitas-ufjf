<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GeoIp2\Database\Reader as Location;

class Atendimentos extends BaseController
{
    public function create()
    {
        $request = $this->request->getJSON(true);
        // echo "pirapnha";
        // exit;
        // return $this->response->setJSON([
        //     'payload' => $request,
        //     'mensagem' => 'Dados inseridos com sucesso'
        // ])->setStatusCode(201);

        // $reader = new Location(
        //     GEOIP2_FILE_DATABASE,
        //     ['pt-BR']
        // );

        $ip_address =  '177.37.126.30' ?? $this->request->getIPAddress();
        // $record = $reader->city($ip_address);


        // $location = $record->city->name . "," . // exibe o nome da cidade
        //     $record->mostSpecificSubdivision->name . "," . // exibe o nome da subdivisão mais específica
        //     $record->country->name . "," . // exibe o nome do país
        //     $record->continent->name; // exibe o nome do continente
        $location = "teste";
        $modelAtendimento = model('Atendimentos');
        $modelAtendimento->insert([
            'profissao_usuario' => $request['resposta'],
            "ip" => $ip_address,
            "localizacao" => $location
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
