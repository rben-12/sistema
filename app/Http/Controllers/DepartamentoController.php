<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use Auth;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasrole('admin')){
        return view('departamentos.index')->with([
            'departamentos' => Departamento::departamento($request->get('departamento'))->paginate(200)
        ]);
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Departamento::create($request->all());
        return redirect()->route('departamentos.index')->with('infob', 'El registro fue agregado exitosamento');
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
        if (Auth::user()->hasrole('admin')){
        return view('departamentos.edit')->with([
            'departamento' => Departamento::find($id)
        ]);
        }
        else{
            return redirect()->route('home');
        }
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
        Departamento::find($id)->update($request->all());
        return redirect()->route('departamentos.index')->with('infob', 'El registro fue actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departamento::destroy($id);
        return back()->with('info', 'El registro fue eliminano');
    }
}
