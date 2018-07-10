@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-d">Nuevo</a>
                <h4><strong class="l">departamentos</strong></h4>
            </div>
        </div>
        

        <div class="col-sm-8 col-sm-offset-2">
            @include('departamentos.create')
            @include('infob')
            @include('info')
        
<div class="panel panel-primary">
    <div class="panel-heading"><strong> catalogo de departamentos</strong> 
        <form class="navbar-form navbar-left pull-right" role="search" action="{{ route('departamentos.index') }}" style="margin: 0;" method="GET">
            <div class="form-group">
            <input type="text" name="departamento" class="form-control" placeholder="Buscar departamento...">
            </div>
            <button class="btn btn-info" type="submit">buscar</button>
        </form> <br><br>
    </div>
        <div class="panel-body">
            <p>
                {{$departamentos->total()}} registros|
                páginas {{$departamentos->currentPage()}} 
                de {{$departamentos->lastPage()}}
            </p>
        <table class="table tc table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
                <tr>
                    <th class="text-center">Departamento</th>
                    <th class="text-center">vlan</th>
                    <th class="text-center">Fecha y Hora</th>
                    <th></th>
                </tr>
            </thead>    
            <tb>
            @foreach($departamentos as $d)
                <tr>
                    <td>{{$d->departamento}}</td>
                    <td>{{$d->vlan}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>
                  
                        <form action="{{route('departamentos.destroy', $d->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs right"> <i class='glyphicon glyphicon-trash'></i></button>
                        </form>
      
                        <a href="{{route('departamentos.edit', $d->id)}}"  class="btn btn-success btn-xs right">
                          <i class='glyphicon glyphicon-edit'></i></a>
                      </td>
                </tr>
            @endforeach
            </tb>
        </table>
        {{$departamentos->links()}}
    </div>
</div>
    </div>
    </div>
</div>
@endsection