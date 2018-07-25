@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-e">Nuevo</a>
                <h4><strong class="l">Encargados</strong></h4>
            </div>
        </div>
        
        <div class="col-sm-8 col-sm-offset-2">
            @include('encargados.create')
            @include('infob')
            @include('info')
        
<div class="panel panel-primary">
    <div class="panel-heading"><strong> Encargados </strong> 
        <form class="navbar-form navbar-left pull-right" role="search" action="{{ route('encargados.index') }}" style="margin: 0;" method="GET">
            <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar encargado...">
            </div>
            <button class="btn btn-info" type="submit">Buscar</button>
        </form> <br><br>
    </div>
        <div class="panel-body">
            <p>
                {{$encargados->total()}} registros|
                páginas {{$encargados->currentPage()}} 
                de {{$encargados->lastPage()}}
            </p>
        <table class="table tc table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
                <tr>
                    <th class="text-center">Encargado</th>
                    <th class="text-center">Fecha y Hora</th>
                    <th width="65px"></th>
                </tr>
            </thead>    
            <tb>
            @foreach($encargados as $e)
                <tr>
                    <td>{{$e->encargado}}</td>
                    <td>{{$e->created_at}}</td>
                    <td>
                  
                        <form action="{{route('encargados.destroy', $e->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs right space"> <i class='glyphicon glyphicon-trash'></i></button>
                        </form>
      
                        <a href="{{route('encargados.edit', $e->id)}}"  class="btn btn-success btn-xs right">
                          <i class='glyphicon glyphicon-edit'></i></a>
                      </td>
                </tr>
            @endforeach
            </tb>
        </table>
        {{$encargados->links()}}
    </div>
</div>
    </div>
    </div>
</div>
@endsection