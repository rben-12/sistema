@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="{{route('articulos.index')}}" class="btn btn-success pull-right">listado</a>
                <h4>
                    <strong class="l">inventario</strong>
                </h4>
            </div>
            <div class="col-sm-6 col-sm-offset-3">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>dispositivo {{$articulo->inv_interno}}</strong>
                        <p class="pull-right">#{{$articulo->id}}</p>
                    </div>
                    <div class="panel-body">

                        <table class="table  table-bordered table-hover table-condensed table-responsive">
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">id</th>
                                    <td class="t2 m">{{$articulo->id}}</td>
                                </tr>
                            </tb>
                            <tbody>
                                <tr>
                                    <th width="20px" class="t1 m">categoria</th>
                                    <td class="t2 m">{{$articulo->categoria->categoria}}</td>
                                </tr>
                            </tbody>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">descrición</th>
                                    <td class="t2 m">{{$articulo->descripcion}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">inventario interno</th>
                                    <td class="t2 m">{{$articulo->inv_interno}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">inventario externo</th>
                                    <td class="t2 m">{{$articulo->inv_externo}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">serie</th>
                                    <td class="t2 m">{{$articulo->serie}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">marca</th>
                                    <td class="t2 m">{{$articulo->marca->marca}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">modelo</th>
                                    <td class="t2 m">{{$articulo->modelo}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">status</th>
                                    <td class="t2 m">{{$articulo->status->status}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">ubicacion</th>
                                    <td class="t2 m">{{$articulo->ubicacion}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">creado </th>
                                    <td class="t2 m">{{$articulo->created_at}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">actualizado </th>
                                    <td class="t2 m">{{$articulo->updated_at}}</td>
                                </tr>
                            </tb>
                            <tb>
                                <tr>
                                    <th width="20px" class="t1 m">resguardante</th>
                                    {{-- <td class="t2 m">{{$articulo->resguardo->resguardante}}</td> --}}
                                    {{-- <td class="t2 m">{{$resguardante->resguardante}}</td> --}}
                                    @if ($articulo->resguardo!=null)
                                        <td class="t2 m">{{$articulo->resguardo->resguardante}}</td>
                                    @else
                                        <td class="t2 m">No se ha asignao a resguardo</td>
                                    @endif
                                    
                                    {{-- @foreach($resguardo->resguardos as $ar)
                                    <td class="t2 m">{{$ar->resguardo->resguardante}}</td>
                                    @endforeach --}}
                                    
                                </tr>
                            </tb>
                        </table>
                        <div class="form-group">
                            <a type="link" class="btn btn-warning pull-right" href="{{route('articulos.index')}}">regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection