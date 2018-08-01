<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargado;
use DB;
use Auth;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('encargados AS e')
        ->where('encargado', 'LIKE', '%'.$request->get('query').'%')
        ->paginate(200);

        if (Auth::user()->hasrole('admin')){
        return view('encargados.index')->with([
            'encargados' => $query
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
        return view('encargados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Encargado::create($request->all());
        return redirect()->route('encargados.index')->with('infob', 'El registro fue agregado exitosamento');
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
        return view('encargados.edit')->with([
            'encargado' => Encargado::find($id)
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
        Encargado::find($id)->update($request->all());
        return redirect()->route('encargados.index')->with('infob', 'El registro fue actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Encargado::destroy($id);
        return back()->with('info', 'El registro fue eliminano');
    }
}
