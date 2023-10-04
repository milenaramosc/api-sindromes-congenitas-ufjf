<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AnalisePacienteFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $body = $request->getJSON(true);
        $response = service('response');
        if (empty($body)) {
            return $response->setJSON([
                'mensagem' => 'Corpo da requisição vazio'
            ])->setStatusCode(400);
        }
    
        $cods = [];
        foreach ($body as $key => $value) {
        
            if (preg_match_all('/cod_(\d+)/', $value, $matches))
               $cods[$key] = implode(',', $matches[1]);
            
            else
                $cods[$key] = $value;
        }


        
        if (empty($cods)) {
            return $response->setJSON([
                'mensagem' => 'Não foi encontrado nenhum código'
            ])->setStatusCode(400);
        }
        
        $request->setBody(json_encode($cods));
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não é necessário fazer nada aqui
    }
}