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
        $mpdf = new  Mpdf(['tempDir' => ROOTPATH . 'public/reports']);
        $renderTemplate =  new RenderTemplate();

        $html = $renderTemplate->render($id_atendimento);
        $mpdf->WriteHTML($html);
        $pdfContent = $mpdf->Output('relatorio.pdf', 'S');
        if ($download) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="relatorio.pdf"');
            header('Content-Length: ' . strlen($pdfContent));
            echo $pdfContent;
            exit;
        }
        header('Content-Type: application/pdf');
        echo $pdfContent;
        exit;
    }
    public function download($id_atendimento) {
        $this->generate($id_atendimento, true);
    }
}
