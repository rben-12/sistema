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
use DB;

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
            $data = Articulo::where('usuario_id', \Auth::user()->id)->get();
            $tipos = 'inventario';
            // dd($data);
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
        $data = Articulo::where('resguardo_id', '=', $id)->get();
    
        $resguardante = Resguardo::where('n_resguardo', '=', $id)->first();

        $tipos = 'resguardo_h';
        $dompdf = new Dompdf();
        // return view('pdf.view', compact('data', 'image', 'tipos', 'id', 'resguardante'));
        $vista = \View::make('pdf.view', compact('data', 'image', 'tipos', 'id', 'resguardante'));
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

    public function busqueda($buscado)
    {
        // dd($buscado);
        $image = '/img/SPF.png';
        $data = Articulo::join('marcas AS m', 'articulos.marca_id', '=', 'm.id')
            ->join('categorias AS c', 'articulos.categoria_id', '=', 'c.id')
            ->join('statuses AS s', 'articulos.status_id', '=', 's.id')
            ->select('articulos.*', 'm.marca', 'c.categoria', 's.status')
            ->where('descripcion', 'LIKE', '%'.$buscado.'%')
            ->orWhere('marca', 'LIKE', '%'.$buscado.'%')
            ->orWhere('categoria', 'LIKE', '%'.$buscado.'%')
            ->orWhere('status', 'LIKE', $buscado.'%')
            ->orWhere('inv_interno', 'LIKE', '%'.$buscado.'%')
            ->orWhere('inv_externo', 'LIKE', '%'.$buscado.'%')
            ->orWhere('serie', 'LIKE', '%'.$buscado.'%')
            ->orWhere('modelo', 'LIKE', '%'.$buscado.'%')
            ->orWhere('ubicacion', 'LIKE', '%'.$buscado.'%')
            // ->where('usuario_id', \Auth::user()->id)
            ->get();
            // ->toSql();
        $tipos = 'inventario_search';

        $dompdf = new Dompdf();
        $vista = \View::make('pdf.view', compact('data', 'image', 'tipos'));
        // return view('pdf.view', compact('data', 'image', 'tipos', 'id', 'resguardante'));
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

    public function searchResguardo($buscado)
    {
        $image = '/img/SPF.png';
        $data = Resguardo::join('departamentos AS d', 'resguardos.departamento_id', '=', 'd.id')
        ->select('resguardos.*', 'd.departamento')
        ->where('n_resguardo', 'LIKE', '%'.$buscado.'%')
        ->orwhere('resguardante', 'LIKE', '%'.$buscado.'%')
        ->orwhere('puesto', 'LIKE', '%'.$request->get('query').'%')
        ->orwhere('departamento', 'LIKE', '%'.$request->get('query').'%')
        ->orwhere('descripcion', 'LIKE', '%'.$request->get('query').'%')
        ->get();
        // dd($data);
        $tipos = 'resguardo_search';

        $dompdf = new Dompdf();
        $vista = \View::make('pdf.view', compact('data', 'image', 'tipos'));
        // return view('pdf.view', compact('data', 'image', 'tipos', 'id', 'resguardante'));
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
}
