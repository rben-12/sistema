@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alt">
                    <a href="{{route('marcas.index')}}" class="btn btn-success pull-right">listado</a>
                    <h4><strong class="l">Marcas</strong></h4>
                </div>
            </div>  
                
<div class="col-sm-6 col-sm-offset-3">
<div class="panel panel-primary">
        <div class="panel-heading">
            <strong>editar marca </strong>
            <p class="pull-right">{{$marcas->marca}}</p>
        </div>
            <div class="panel-body">
    
                {!! Form::open(['route' => ['marcas.update', $marcas, '_method'=>'PUT']]) !!}
                        

                    <div class="form-group">
                        <label for="">marca</label>
                        <input value="{{$marcas->marca}}" type="text" class="form-control" name="marca">
                    </div>
                        
                    <div class="form-group">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
                   
                
            </div>
        </div>
    </div>
</div>
@endsection