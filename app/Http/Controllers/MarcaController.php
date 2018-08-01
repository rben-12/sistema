<?php

namespace App\Http\Controllers;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use App\Marca;
use Auth;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    
    public function index(Request $request)
    {
        if (Auth::user()->hasrole('admin')){
        return view('marca.index')->with([
            'marcas' => Marca::marca($request->get('marca'))->paginate(200)
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
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Marca::create($request->all());
        return redirect()->route('marcas.index')->with('infob', 'El registro fue agregado exitosamento');
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
        $marcas = Marca::find($id);
        return view('marca.edit',compact('marcas'));
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
        Marca::find($id)->update($request->all());

        return redirect()->route('marcas.index')->with('infob', 'El registro fue actualizado exitosamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marca::destroy($id);
        return back()->with('info', 'El registro fue eliminano');
    }
}
