<?php

namespace App\Controllers;

use Mpdf\Mpdf;

class Pdf extends BaseController
{
    public function generate()
    {
        // Create new mPDF object
        $mpdf = new  Mpdf();
       
        $renderTemplate =  new RenderTemplate();
        $html = $renderTemplate->render();
        $mpdf->WriteHTML($html);
        
        return redirect()->to($mpdf->Output('relatorio.pdf', 'I'));
    }
}
