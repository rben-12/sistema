@extends('layouts.app') 
@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alt">
              <a href="{{route('documentos.index')}}" class="btn btn-success pull-right">listado</a>
              <h4>
                <strong class="l">Dicumento</strong>
              </h4>
            </div>
<div class="col-sm-6 col-sm-offset-3">
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <strong>editar documento</strong>
            <p class="pull-right">#{{$documentos->id}}</p>
        </div>   
    <div class="panel-body">
        <form action="{{ route('documentos.update', $documentos->id) }}" method="POST">
                    
            {{csrf_field()}}
            {{method_field('PUT')}}
            
            <div class="form-group">
                <label for="">folio</label>
                <input type="text" class="form-control" name="folio" value="{{ $documentos->folio }}" required>
            </div>

            <div class="form-group">
                <label for="">descripcion</label>
                <textarea class="form-control" rows="3" name="descripcion">{{ $documentos->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="">tipo del documento</label>
                <select name="tipo_id" class="form-control" required>
                    @foreach($tipos as $t)
                    <option value="{{$t->id}}">{{$t->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">fecha del documento</label>
                <input type="date" class="form-control"  name="fecha_doc" value="{{ $documentos->fecha_doc }}">
            </div>

            <div class="form-group">
                    <label>adjunto</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="glyphicon glyphicon-file"></i> Cargar
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="url" value="{{ $documentos->url }}">
                    </div>
            </div>
                {{-- <img id="holder" style="margin-top:15px;max-height:100px;"> --}}

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
            </div> 
        </form>
    </div>
    </div>
</div>
</div>
</div>
</div>
@endsection