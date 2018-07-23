<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resguardo;
use App\Departamento;
use App\Articulo;
use App\Resguardos_history;
use DB;

class ResguardoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('resguardos AS r')
        ->join('departamentos AS d', 'r.departamento_id', '=', 'd.id')
        //->join('articulos AS a', 'r.articulo_id', '=', 'r.id')
        ->select('r.*', 'd.departamento')
        ->where('n_resguardo', 'LIKE', '%'.$request->get('query').'%')
        ->orwhere('resguardante', 'LIKE', '%'.$request->get('query').'%')
        ->paginate(200); 

        return view('resguardos.index')->with([
            //'resguardos' => Resguardo::paginate(10),
            'resguardos' => $query,
            'buscado' => $request->get('query'),
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
        //$resguardos->ip_address = Request()->ip_address;
        //$resguardos->mac_address = Request()->mac_address;
        $resguardos->articulo_id = Request()->articulo_id;
        $resguardos->usuario_id = Request()->usuario_id;
        $resguardos->extencion = Request()->extencion;
        $resguardos->archivo = Request()->url;


        
        //tags
        $tags = Request()->input('articulo_id');
        //dd($tags);
        $loc = explode(",", $tags);
        // dd($loc);
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
                    $resguardos->save();
                    $resguardo_id = $resguardos->id;
                    foreach ($loc as $location)
                    {
                        // dd($location);
                        $tag = Articulo::where('id', $location)->update(['resguardo_id'=>$resguardo_id]);
                        // $tag->articulo_id = $location;
                        // $tag->resguardo_id = $resguardo_id;
                        // $tag->update();
                        //return redirect()->route('resguardos.index')->with('infob', 'Resguardo creado exitosamente');
                        // $tagFind = Resguardos_history::find($location);
                        // // dd($tagFind);
                        // // if ($tagFind!=null) {
                        //     //return "encontrado";
                        //     //return redirect()->route('resguardos.index')->with('infob', 'ya se ha asignado ese articulo a otra persona');
                        // // }
                        // // else{
                        //     $resguardos->save();
                        //     $resguardo_id = $resguardos->id;

                        //     $tag->articulo_id = $location;
                        //     $tag->resguardo_id = $resguardo_id;
                        //     $tag->save();

                        //     return redirect()->route('resguardos.index')->with('infob', 'Resguardo creado exitosamente');
                        // // }
                    }
                    return redirect()->route('resguardos.index')->with('infob', 'Resguardo creado exitosamente');
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
        // $resguardoShow = Resguardos_history::join('resguardos', 'resguardos.id', '=', 'resguardos_histories.resguardo_id')
        //     ->join('articulos', 'articulos.id', '=', 'resguardos_histories.articulo_id')
        //     ->where('resguardos.n_resguardo', '=', $id)->get();
        // dd($id);

        $resguardoShow = Articulo::where('resguardo_id', '=', $id)->get();
        
        $resguardante = Resguardo::where('n_resguardo', '=', $id)->first();

        // dd($resguardoShow);
        return view('resguardos.show', compact('resguardoShow', 'id', 'resguardante'));
        // return view('articulos.show')->with([
        //     'resguardo' => Resguardo::find($id),
        //     'articulo' => Articulo::all(),
        //     'departamentos' => Departamento::all(),
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
        return view('resguardos.edit')->with([
            'resguardo' => Resguardo::find($id),
            'articulo' => Articulo::all(),
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
        // dd($id);
        // dd($request);
        Resguardo::find($id)
            ->update(['resguardante'=>$request->resguardante,
                    'puesto'=>$request->puesto,
                    'departamento_id'=>$request->departamento_id,
                    'descripcion'=>$request->descripcion,
                    'estencion'=>$request->extencion,
                    'archivo' => $request->url
            ]);
        // $resguardo = new Resguardo();

        // $resguardoFind = Resguardo::find($id);
        // // dd($resguardoFind);
        // // $resguardoHFind = Resguardos_history::where('resguardo_id', $resguardoFind->id)->get();
        // // dd($resguardoHFind);
        // $resguardoAr = Articulo::select('id')->where('resguardo_id', '=', $id)->get();

        // $resguardoFind->descripcion = $request['descripcion'];
        // $resguardoFind->extension = $request['extencion'];
        // $resguardoFind->articulo_id = $request['articulo_id'];

        // $tags = Request()->input('articulo_id');
        // //dd($tags);
        // $loc = explode(",", $tags);
        
        // // $ids = [];
        // foreach ($resguardoAr as $key) {
        //     $ids [] = $key->id;
        // }
        // foreach($loc as $key2){
        //     if (in_array($key2, $ids)){
        //         echo "existe ".$key2."<br>";
        //     }
        //     else {
        //         //echo "no existe ".$key2."<br>";
        //         $update = Articulo::where('id',$key2)->update(['resguardo_id'=>$id]);
        //         $update2 = Resguardo::where('id',$id)->update(['articulo_id'=>$tags]);
        //     }
        // }
        // $resultado = array_diff_assoc($loc, $ids);
        // dd($resultado);

        // dd($loc);

        
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
        $resGet = Articulo::where('resguardo_id',$id)->update(['resguardo_id'=>'0']);
        return back()->with('info', 'El registro fue eliminano');
    }

    public function get(Request $request)
    {
        // return $request->busqueda;
        $busqueda = Articulo::where('inv_interno', $request->busqueda)
            ->orWhere('inv_externo', $request->busqueda)
            ->orWhere('serie', $request->busqueda)
            ->orWhere('modelo', $request->busqueda)
            ->orWhere('id', $request->busqueda)
            ->get();
        if ($busqueda!=null) {
            return response()->json($busqueda);
        }
        else{
            return('No se encontro articulo');
        }
        
    }

    public function addArtRes(Request $request)
    {
        $add = Articulo::where('id', $request->id)->update(['resguardo_id'=>$request->nResguardo]);
        $getRes = Resguardo::where('n_resguardo', $request->nResguardo)->first();
        $resguardoShow = Articulo::where('resguardo_id', '=', $getRes->id)->orderBy('id', 'DESC')->limit(1)->first();
        $artResg = '';
        if ($getRes->articulo_id!=null) {
            $artResg = $getRes->articulo_id.','.$request->id;
        }
        else{
            $artResg = $request->id;
        }
        $updateRes = Resguardo::where('n_resguardo', $request->nResguardo)->update(['articulo_id'=>$artResg]);
        // return ($artResg);
        $resHistory = new Resguardos_history();
        $resHistory->articulo_id = $request->id;
        $resHistory->resguardo_id = $getRes->id;
        // return $resHistory;
        $resHistory->save();

        return response()->json($resguardoShow);
    }

    public function deleteArToRes($id)
    {
        // return($id);
        $artGet = Articulo::find($id);
        $resetArt = Articulo::where('id',$id)->update(['resguardo_id'=>'0']);
        $resGet = Resguardo::where('id', $artGet->resguardo_id)->first();
        $loc = explode(",", $resGet->articulo_id);
        $clave = array_search($id, $loc);
        unset($loc[$clave]);
        $loc2 = implode(",", $loc);
        // dd($loc2);
        // var_export($loc);
        $resetRes = Resguardo::where('id', $artGet->resguardo_id)->update(['articulo_id'=>$loc2]);
        return back()->with('info', 'El registro fue eliminano');
    }

    public function getNoResguardo()
    {
        // return($id);
        $resNresguardo = Resguardo::orderBy('n_resguardo', 'DESC')->first();
        $nresguardo = '';
        // dd ($resNresguardo);
        $start = '';
        if ($resNresguardo!=null) {
            $nresguardo = $resNresguardo->n_resguardo+1;
            $start = $nresguardo;
        }
        else
        {
            $start = 1;
        }
        $count = 1;
        $digits = 8;
        $res = '';
        for ($n = $start; $n < $start + $count; $n++) {
           $res = str_pad($n, $digits, "0", STR_PAD_LEFT);
        }
        //return $res;
        return response()->json($res);

    }
}
