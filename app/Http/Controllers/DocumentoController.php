<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Tipo;
use DB;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('documentos AS doc')
        ->join('tipos AS t', 'doc.tipo_id', '=', 't.id')
        ->select('doc.*', 't.tipo')
        ->where('folio', 'LIKE', '%'.$request->get('query').'%')
        ->orwhere('descripcion', 'LIKE', '%'.$request->get('query').'%')
        ->orwhere('tipo', 'LIKE', '%'.$request->get('query').'%')
        ->paginate(200);

        return view('documentos.index')->with([
            'documentos' => $query,
            'tipos' => Tipo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('documentos.create')->with([
            'tipos' => Tipo::all()
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
        Documento::create($request->all());
        return redirect()->route('documentos.index')->with('infob', 'El registro fue agregado exitosamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('documentos.edit')->with([
            'tipos' => Tipo::all(),
            'documentos' => Documento::findOrFail($id)
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
        Documento::findOrFail($id)->update($request->all());
        return redirect()->route('documentos.index')->with('infob', 'El registro fue actualizado exitosamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $array = array('0'=>'Se ha eliminado el registro');
        // return($id);
        Documento::find($id)->delete();
        return response()->json($array);
    }
}
