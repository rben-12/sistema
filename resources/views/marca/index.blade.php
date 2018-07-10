@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-m">Nuevo</a>
                <h4><strong class="l">Marcas</strong></h4>
            </div>
        </div>
        

        <div class="col-sm-8 col-sm-offset-2">
        @include('marca.create')
        @include('infob')
        @include('info')
        
<div class="panel panel-primary">
    <div class="panel-heading"><strong> catalogo de marcas </strong>
        <form class="navbar-form navbar-left pull-right" role="search" action="{{ route('marcas.index') }}" style="margin: 0;" method="GET">
            <div class="form-group">
            <input type="text" name="marca" class="form-control" placeholder="Buscar marca...">
            </div>
            <button class="btn btn-info" type="submit">buscar</button>
        </form> <br><br>
    </div>
    
        <div class="panel-body">
            <p>
                {{$marcas->total()}} registros|
                páginas {{$marcas->currentPage()}} 
                de {{$marcas->lastPage()}}
            </p>
        <table class="table tc table-bordered table-striped table-condensed table-hover table-responsive">
            <thead>
                <tr>
                    <th class="text-center">Marcas</th>
                    <th class="text-center">Fecha y Hora</th>
                    <th class="text-center"></th>
                </tr>
            </thead>    
            <tb>
            @foreach($marcas as $m)
                <tr>
                    <td>{{$m->marca}}</td>
                    <td>{{$m->created_at}}</td>
                    <td>
                    <form action="{{route('marcas.destroy', $m->id)}}" method="POST">
                      {{ csrf_field() }}
                      {{method_field('DELETE')}}
                      <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs right"> <i class='glyphicon glyphicon-trash'></i></button>
                    </form>
                        <form action="{{route('marcas.edit', $m->id)}}" method="GET">
                        <button type="submit" class="btn btn-success btn-xs right"> <i class='glyphicon glyphicon-edit'></i></button>
                      </form>
                    </td>
                </tr>
            @endforeach
            </tb>
        </table>
        {{$marcas->links()}}
    </div>
</div>
    </div>
    </div>
</div>
@endsection