<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Session;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Marca;
use App\Status;
use App\Categoria;
use App\Articulo;
use App\Resguardo;
use App\Resguardos_history;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    { 
        return view('articulos.index')->with([
	        //'articulos'=>Articulo::paginate(10),
            'articulos' => Articulo::artic($request->get('articulo'))->paginate(10),
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
            'statuses' => Status::all(),
            'resguardos' => Resguardo::all()
            
        ]);
    
    }
   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create')->with([
        
        'categorias' => Categoria::all(),
        'marcas' => Marca::all(),
        'statuses' => Status::all()

    ]);
    }
    /*'marcas' => Marca::all(),
    'statuses' => Status::all(),*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inv_externo' => 'required|unique:articulos',
            'inv_interno' => 'required|unique:articulos',
            'serie' => 'required|unique:articulos',
        ]);
        Articulo::create($request->all());
        return redirect()->route('articulos.index')->with('infob', 'El registro fue agregado exitosamento');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);
        $categorias = Categoria::all();
        $resguardo = Resguardos_history::where('articulo_id', '=', $id)->first();
        if ($resguardo!=null) {
            $resguardante = Resguardo::where('id', '=', $resguardo->resguardo_id)->first();
        }
        

        // dd($resguardo);

        return view('articulos.show', compact('articulo', 'categorias', 'resguardante'));
        //dd($articulo);
        // return view('articulos.show')->with([
        //     'articulo' => Articulo::find($id),
        //     'categorias' => Categoria::all(),
        //     'marcas' => Marca::all(),
        //     'statuses' => Status::all(),
        //     'resguardos' => Resguardo::all()
        // ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        return view('articulos.partials.edit')->with([
            'articulo' => Articulo::find($id),
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
            'statuses' => Status::all()
        ]); 
    }
    /*Articulo::edit($id);
    return view('articulos.partials.edit');*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Articulo::find($id)->update($request->all());
        return redirect()->route('articulos.index')->with('infob', 'El registro fue actualizado exitosamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Articulo::destroy($id);
        return back()->with('info', 'El registro fue eliminano');
    }
}
