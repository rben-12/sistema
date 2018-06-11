@extends('layouts.app')
@section('content')

<div class="container-fluid">
  <div class="row">
      <div class="col-sm-12">
          <div class="alert alt">
              <h4><strong class="l">documentos</strong></h4>
          </div>
      </div>

    <div class="col-sm-8 col-sm-offset-2">
        @include('infob')
      <div class="panel panel-primary">
        <div class="panel-heading"><strong>Agregar archivos</strong></div>
       
          <div class="panel-body">
            <form method="POST" action="storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
              
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              <div class="form-group">
                <label class="col-md-4 control-label">Nuevo Archivo</label>
                <div class="col-md-6">
                  <input type="file" class="form-control, btn btn-default" name="file" >
                  <br>
                </div>
              </div>
   
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-success">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection