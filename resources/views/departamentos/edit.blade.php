@extends('layouts.app') @section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alt">
                    <a href="{{route('departamentos.index')}}" class="btn btn-success pull-right">listado</a>
                    <h4><strong class="l">Departamentos</strong></h4>
                </div>
            </div>  
                
<div class="col-sm-6 col-sm-offset-3">
<div class="panel panel-primary">
        <div class="panel-heading">
            <strong>editar departamento </strong>
            <p class="pull-right">{{$departamento->departamento}}</p>
        </div>
            <div class="panel-body">
    
        <form action="{{route('departamentos.update', $departamento)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
                        
                <div class="form-group">
                    <label for="">departamento</label>
                    <input value="{{$departamento->departamento}}" type="text" class="form-control" name="departamento">
                </div>
                <div class="form-group">
                    <label>vlan</label>
                    <input value="{{$departamento->vlan}}" type="text" class="form-control" name="vlan">
                </div>
                        
            <div class="form-group">
            <a type="link" class="btn btn-danger right space" href="{{route('departamentos.index')}}">Cancelar</a>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success right">Guardar</button>
            </div>
        </form>
                   
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection