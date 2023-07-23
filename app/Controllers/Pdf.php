<?php

namespace App\Controllers;

use Mpdf\Mpdf;
use App\Controllers\BaseController;
class Pdf extends BaseController
{

    public function generate($id_atendimento, $download = false)
    {
       if(!is_numeric($id_atendimento)){
            return $this->response->setJSON([
                'errors' =>  $this->request,
                'id_atendimento' => $id_atendimento,
                'mensagem' => 'Campos invalidos'
            ])->setStatusCode(400);
        }
        // Create new mPDF object
        $mpdf = new  Mpdf();
        $renderTemplate =  new RenderTemplate();

        $html = $renderTemplate->render($id_atendimento);
        $mpdf->WriteHTML($html);
        if ($download) {
            return $mpdf->Output('relatorio.pdf', 'D');
        }
        return redirect()->to($mpdf->Output('relatorio.pdf', 'I'));
    }
    public function download($id_atendimento) {
        $this->generate($id_atendimento, true);
    }
}
