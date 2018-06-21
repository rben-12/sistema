<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resguardo;
use App\Departamento;
use App\Articulo;
use App\Resguardos_history;

class ResguardoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resguardos.index')->with([
            'resguardos' => Resguardo::paginate(10),
            'departamentos' => Departamento::all(),
            'articulos' => Articulo::all(),
            'resguardos_h' => Resguardos_history::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resguardos.create')->with([
            'departamentos' => Departamento::all(),
            'articulos' => Articulo::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Resguardo::create($request->all());
        // return redirect()->route('resguardos.index')->with('infob', 'El registro fue agregado exitosamento');
        //datos de resguardo
        $resguardos = new Resguardo();
        $resguardos->n_resguardo = Request()->n_resguardo;
        $resguardos->resguardante = Request()->resguardante;
        $resguardos->puesto = Request()->puesto;
        $resguardos->departamento_id = Request()->departamento_id;
        $resguardos->descripcion = Request()->descripcion;
        $resguardos->extencion = Request()->extencion;
        $resguardos->ip_address = Request()->ip_address;
        $resguardos->mac_address = Request()->mac_address;
        $resguardos->extencion = Request()->extencion;


        
        //tags
        $tags = Request()->input('articulo_id');
        //dd($tags);
        $loc = explode(",", $tags);

        $n_resguardo = Resguardo::where('n_resguardo', '=', Request()->n_resguardo)->first();
        if ($n_resguardo!=null) {
            return redirect()->route('resguardos.index')->with('infob', 'ya se ha registrado este numero de resguardo');
        }
        else
        {
            $resguardante = Resguardo::where('resguardante', '=', Request()->resguardante)->first();
            if ($resguardante==null) {
                //guardando las tags
                // if ($resguardos->save()) {
                    foreach ($loc as $location)
                    {
                        $tag = new Resguardos_history();
                        $tagFind = Resguardos_history::find($location);
                        // dd($tagFind);
                        if ($tagFind!=null) {
                            //return "encontrado";
                            return redirect()->route('resguardos.index')->with('infob', 'ya se ha asignado ese articulo a otra persona');
                        }
                        else{
                            $resguardos->save();
                            $resguardo_id = $resguardos->id;

                            $tag->articulo_id = $location;
                            $tag->resguardo_id = $resguardo_id;
                            $tag->save();

                            return redirect()->route('resguardos.index')->with('infob', 'Resguardo creado exitosamente');
                        }
                    }
                // }
            }
            else
            {
                return redirect()->route('resguardos.index')->with('infob', 'ya se ha registrado a esta persona');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $resguardoShow = Resguardos_history::join('resguardos', 'resguardos.id', '=', 'resguardos_histories.resguardo_id')
            ->join('articulos', 'articulos.id', '=', 'resguardos_histories.articulo_id')
            ->where('resguardos.n_resguardo', '=', $id)->get();
        
        $resguardante = Resguardo::where('n_resguardo', '=', $id)->first();

        // dd($resguardoShow);
        return view('resguardos.show', compact('resguardoShow', 'id', 'resguardante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
