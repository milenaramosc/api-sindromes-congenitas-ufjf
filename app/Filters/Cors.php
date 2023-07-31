<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Cors implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //Access-Control-Allow-Credential:
        $response = service('response');
        
        // Defina os cabeçalhos CORS permitidos
        $response->setHeader('Access-Control-Allow-Origin', '*'); // Ou o domínio específico permitido
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        $response->setHeader('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Requested-With, Authorization, Accept, Access-Control-Request-Method, Access-Control-Request-Headers');
        
        // Habilitar o cabeçalho Access-Control-Allow-Credentials
        $response->setHeader('Access-Control-Allow-Credentials', 'true');
        
        // Se a solicitação for OPTIONS, encerre a execução e retorne uma resposta vazia
        if ($request->getMethod() === 'OPTIONS') {
            $response->setStatusCode(200);
            $response->setBody('');
            return $response;
        }
        
        return $request;

    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
