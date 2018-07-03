@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="{{route('incidencias.index')}}" class="btn btn-success pull-right">listado</a>
                <h4><strong class="l">Incidencias</strong></h4>   
            </div>
        </div>  
                
<div class="col-sm-6 col-sm-offset-3">
<div class="panel panel-primary">
        <div class="panel-heading">
            <strong>editar incidencias </strong>
            <p class="pull-right">{{$incidencia->id}}</p>
        </div>
            <div class="panel-body">
    
        <form action="{{route('incidencias.update', $incidencia)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
                <div class="form-group">
                    <label for="">asunto</label>
                    <select name="asunto_id" class="form-control" required>
                        @foreach($asuntos as $asu)
                        <option value="{{$asu->id}}" {{($incidencia->asunto_id = $asu->id)? 'selected': ''}}>{{$asu->asunto}}</option>
                        @endforeach
                    </select>
                </div>
                        
                <div class="form-group">
                    <label for="">descripcion</label>
                    <input value="{{$incidencia->descripcion}}" type="text" class="form-control" name="departamento">
                </div>
                <div class="form-group">
                    <label for="">encargado</label>
                    <select name="encargado_id" class="form-control" required>
                        @foreach($encargados as $e)
                        <option value="{{$e->id}}" {{($incidencia->encargado_id == $e->id)? 'selected': ''}}>{{$e->encargado}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>departamento</label>
                    <select name="departamento_id" class="form-control" required>
                        @foreach($departamentos as $d)
                        <option value="{{$d->id}}" {{($incidencia->departamento_id == $d->id)? 'selected': ''}}>{{$d->departamento}}</option>
                        @endforeach
                    </select>
                </div>    
                <div class="form-group">
                    <label>solucion</label>
                    <input value="{{$incidencia->solucion}}" type="text" class="form-control" name="vlan">
                </div>
                        
                
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">Guardar</button>
            </div>
        </form>
                   
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection