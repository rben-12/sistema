<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencia;
//use App\Asunto;
use App\Encargado;
use App\Departamento;
use DB;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('incidencias AS i')
        ->join('encargados AS e', 'i.encargado_id', '=', 'e.id')
        ->join('departamentos AS d', 'i.departamento_id', '=', 'd.id')
        ->select('i.*', 'e.encargado', 'd.departamento')
        ->where('asunto', 'LIKE', '%'.$request->get('query').'%')
        ->orwhere('descripcion', 'LIKE', '%'.$request->get('query').'%')
        ->paginate(200);

        return view('incidencias.index')->with([
            //'incidencias' => Incidencia::paginate(4),
            'incidencias' => $query,
            'encargados' => Encargado::all(),
            'departamentos' => Departamento::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Incidencia::create($request->all());
        return redirect()->route('incidencias.index')->with('infob', 'El registro fue agregado exitosamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('incidencias.edit')->with([
            'incidencia' => Incidencia::find($id),
            'encargados' => Encargado::all(),
            'departamentos' => Departamento::all()
        ]);
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
        Incidencia::find($id)->update($request->all());
        return redirect()->route('incidencias.index')->with('infob', 'El registro fue actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incidencias::destroy($id);
        return back()->with('info', 'El registro fue eliminano');
    }
}
