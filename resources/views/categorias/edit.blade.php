@extends('layouts.app') @section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alt">
                    <a href="{{route('departamentos.index')}}" class="btn btn-success pull-right">listado</a>
                    <h4><strong class="l">Categorias</strong></h4>
                </div>
            </div>  
                
<div class="col-sm-6 col-sm-offset-3">
<div class="panel panel-primary">
        <div class="panel-heading">
            <strong>Editar categoria </strong>
            <p class="pull-right">{{$categoria->categoria}}</p>
        </div>
            <div class="panel-body">
    
        <form action="{{route('categorias.update', $categoria)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
                        
                <div class="form-group">
                    <label for="">departamento</label>
                    <input value="{{$categoria->categoria}}" type="text" class="form-control" name="categoria">
                </div>
                        
            <div class="form-group">
            <a type="link" class="btn btn-danger right space" href="{{route('categorias.index')}}">Cancelar</a>
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