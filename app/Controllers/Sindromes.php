<?php

namespace App\Controllers;


use App\Controllers\BaseController;

class Sindromes extends BaseController
{
    public function index()
    {
        $resp = $this->request->getJSON(true);
        $resp = $this->request->getVar();// pega get, post...
        return $this->response->setJSON($resp)->setStatusCode(401);
    }
}
