@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-i">Nuevo</a>
                <h4><strong class="l">incidencias</strong></h4>
            </div>
        </div>
        @include('incidencias.create')

        <div class="col-sm-12">
        @include('infob')
        @include('info')
        
<div class="panel panel-primary">
    <div class="panel-heading">
        <strong> registro de incidencias </strong> <a href="{{ route('pdf', 'incidencias') }}" target="_blank" class="btn btn-info" type="button">Exportar PDF</a>
        <form class="navbar-form navbar-left pull-right" role="search" action="{{ route('incidencias.index') }}" style="margin: 0;" method="GET">
            <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar incidencia...">
            </div>
            <button class="btn btn-info" type="submit">Buscar</button>
          </form>
    </div>
        <div class="panel-body">
            <p>
                {{$incidencias->total()}} registros|
                páginas {{$incidencias->currentPage()}} 
                de {{$incidencias->lastPage()}}
            </p>
    <div class="table-responsive">
        <table class="table tc table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
                <tr>
                    <th class="text-center" width="10px">Id</th>
                    <th class="text-center" width="150px">asunto</th>
                    <th class="text-center">descripción</th>
                    <th class="text-center" width="150px">encargado</th>
                    <th class="text-center" width="180px">departamento</th>
                    <th class="text-center">solucion</th>
                    <th class="text-center" width="150px">Fecha y Hora</th>
                    <th class="text-center" width="65px"></th>
                </tr>
            </thead>    
            <tb>
            @foreach($incidencias as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->asunto}}</td>
                    <td>{{$i->descripcion}}</td>
                    <td>{{$i->encargado}}</td>
                    <td>{{$i->departamento}}</td>
                    <td>{{$i->solucion}}</td>
                    <td>{{$i->created_at}}</td>
                    <td>
                        <form action="{{route('incidencias.destroy', $i->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs right space"> <i class='glyphicon glyphicon-trash'></i></button>
                        </form>
      
                        <a href="{{route('incidencias.edit', $i->id)}}" class="btn btn-success btn-xs right">
                          <i class='glyphicon glyphicon-edit'></i></a>
      
                        <!--<a href="{{route('incidencias.show', $i->id)}}" class="btn btn-warning btn-xs">
                          <i class='glyphicon glyphicon-eye-open'></i></a>-->
                    </td>
                </tr>
            @endforeach
            </tb>
        </table>
        {{$incidencias->links()}}
    </div>
    </div>
</div>
    </div>
    </div>
</div>
@endsection