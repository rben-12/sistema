@extends('layouts.app') @section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alt">
        <a href="{{route('resguardos.index')}}" class="btn btn-success pull-right">Listado</a>
        <h4>
          <strong class="l">resguardo</strong>
        </h4>
      </div>
    </div>
        
<div class="col-sm-6 col-sm-offset-3">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <strong>editar resguardos</strong>
            <p class="pull-right">{{$resguardo->n_resguardo}} </p>
        </div>
            <div class="panel-body">

            <form action="{{route('resguardos.update', $resguardo)}}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                
                <div class="form-group">
                    <label for="">número de resguardo</label>
                    <input type="text" value="{{$resguardo->n_resguardo}}" class="form-control" name="n_resguardo">
                </div>

                <div class="form-group">
                    <label for="">resguardante</label>
                    <input type="text" value="{{resguardo->resguardante}}" class="form-control" name="resguardante">
                </div>

                
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
                
                <div class="form-group">
                    <a type="link" class="btn btn-danger pull-right" href="{{route('resguardos.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
@endsection