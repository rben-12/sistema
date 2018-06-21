@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alt">
                  <h4>
                    <strong class="l">detalle del resguardo n°{{ $id }}</strong>
                  </h4>
                </div>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>resguardos asignados a: {{ $resguardante->resguardante }}</strong>
                        <a href="{{ route('pdf_h', $id) }}" target="_blank" class="btn btn-info">
                            Exportar PDF
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cant</th>
                                    <th>Descripcion</th>
                                    <th>Serie</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Inv interno</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resguardoShow as $item)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->serie }}</td>
                                        <td>{{ $item->marca->marca }}</td>
                                        <td>{{ $item->modelo }}</td>
                                        <td>{{ $item->articulo->inv_interno }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection