<?php

namespace App\Controllers;

use Mpdf\Mpdf;
use App\Controllers\BaseController;
class Pdf extends BaseController
{

    public function generate($id_atendimento = 424)
    {
        // Create new mPDF object
        $mpdf = new  Mpdf();
        // return $this->response->setJSON([
        //     'errors' =>  $this->request,
        //     'id_atendimento' => $id_atendimento,
        //     'mensagem' => 'Campos invalidos'
        // ])->setStatusCode(400);
        $id_atendimento = $this->request->getVar('id_atendimento');
       // print_r($id_atendimento);exit();
        // $modelAnalisePaciente = model('AnaliseRelatorio');
        // $queryResult = $modelAnalisePaciente
        //                 ->where('fk_atendimento', $id_atendimento)
        //                 ->get()->getResultArray();
        $renderTemplate =  new RenderTemplate();
    
        // $data['resposta'] = $queryResult;

        $html = $renderTemplate->render($id_atendimento);
        $mpdf->WriteHTML($html);
        
        return redirect()->to($mpdf->Output('relatorio.pdf', 'I'));
    }
}
