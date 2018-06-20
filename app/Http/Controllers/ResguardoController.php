<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resguardo;
use App\Departamento;
use App\Articulo;

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
            'articulos' => Articulo::all()
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
    public function store(Request $request)
    {
        Resguardo::create($request->all());
        return redirect()->route('resguardos.index')->with('infob', 'El registro fue agregado exitosamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('articulos.show')->with([
            'resguardo' => Resguardo::find($id),
            'articulos' => Articulo::all(),
            'departamentos' => Departamentos::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('resguardos.edit')->with([
            'resguardo' => Resguardo::find($id),
            'articulos' => Articulo::all(),
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
        Resguardo::find($id)->update($request->all());
        return redirect()->route('resguardos.index')->with('infob', 'El registro fue actualizado exitosamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resguardo::destroy($id);
        return back()->with('info', 'El registro fue eliminano');
    }
}
