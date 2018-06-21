<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Articulo;
use App\Incidencia;
use App\Resguardo;
use App\Resguardos_history;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class pdfController extends Controller
{
    public function index($tipo)
    {
        $data = '';
        $tipos = '';
        $image = '/img/SPF.png';

        if ($tipo == 'incidencias') {
            $data = Incidencia::get();
            $tipos = 'incidencias';
            $dompdf = new Dompdf();
            $vista = \View::make('pdf.view', compact('data', 'image', 'tipos'));
            $dompdf->loadHtml($vista);

            $dompdf->setPaper('A4', 'landscape');
            
            $dompdf->render();

            if (isset($dompdf)) {
                $x = 370;
                $y = 550;
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $font = $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
                $size = 10;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $dompdf->getCanvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
            }
        }
        if ($tipo == 'inventario') {
            $data = Articulo::get();
            $tipos = 'inventario';
            // return View('pdf.view', compact('data'));
            // $vista = \View::make('pdf.view', compact('data', 'image'))->render();

            // $pdf=PDF::loadHtml($vista)->setPaper('a4', 'landscape');

            // return $pdf->stream('reporte.pdf');  

            $dompdf = new Dompdf();
            $vista = \View::make('pdf.view', compact('data', 'image', 'tipos'));
            $dompdf->loadHtml($vista);

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->render();

            if (isset($dompdf)) {
                $x = 370;
                $y = 550;
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $font = $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
                $size = 10;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $dompdf->getCanvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
            }
            // $dompdf->getCanvas()->page_text(250, 10, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
            // $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        }

        if ($tipo == 'resguardo') {
            $data = Resguardo::get();
            $tipos = 'resguardo';
            $dompdf = new Dompdf();
            $vista = \View::make('pdf.view', compact('data', 'image', 'tipos'));
            // return view('pdf.view', compact('data', 'image', 'tipos'));
            $dompdf->loadHtml($vista);

            $dompdf->setPaper('A4', 'landscape');
            
            $dompdf->render();

            if (isset($dompdf)) {
                $x = 370;
                $y = 550;
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $font = $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
                $size = 10;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $dompdf->getCanvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
            }
        }

        if ($tipo == 'resguardo_h') {
            
        }
    }
    public function showH($id)
    {
        $image = '/img/SPF.png';
        
        $data = Resguardos_history::join('resguardos', 'resguardos.id', '=', 'resguardos_histories.resguardo_id')
        ->join('articulos', 'articulos.id', '=', 'resguardos_histories.articulo_id')
        ->where('resguardos.n_resguardo', '=', $id)->get();
    
        $resguardante = Resguardo::where('n_resguardo', '=', $id)->first();

        $tipos = 'resguardo_h';
        $dompdf = new Dompdf();
        $vista = \View::make('pdf.view', compact('data', 'image', 'tipos', 'id', 'resguardante'));
        //return view('pdf.view', compact('data', 'image', 'tipos', 'id', 'resguardante'));
        $dompdf->loadHtml($vista);

        $dompdf->setPaper('A4');
        
        $dompdf->render();

        if (isset($dompdf)) {
            $x = 260;
            $y = 810;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $dompdf->getCanvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        }
    }
}
