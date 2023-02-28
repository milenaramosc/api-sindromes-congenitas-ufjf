<?php

namespace App\Controllers;

use Mpdf\Mpdf;

class Pdf extends BaseController
{
    public function generate()
    {
        // $this->load->library('mpdf');
        // Create new mPDF object
        $mpdf = new  Mpdf();
       
        // $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $renderTemplate =  new RenderTemplate();
        $html = $renderTemplate->render();
        $mpdf->WriteHTML($html);
        
        return redirect()->to($mpdf->Output('my_document.pdf', 'I')) ;
    }
}
