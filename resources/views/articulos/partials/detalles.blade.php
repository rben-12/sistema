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
                        <strong>Historial | {{$articulo->inv_interno}}</strong>
                        <p class="pull-right">#{{$articulo->id}}</p>
                    </div>
                    <div class="panel-body">

                            <table class="table  table-bordered table-hover table-condensed table-responsive">
                                    <thead>
                                        <tr>
                                            <th>resguardante</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($articulo->resguardos as $ar)
                                            <td>{{$ar->resguardante}}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
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
