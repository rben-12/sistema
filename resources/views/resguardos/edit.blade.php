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
                {{-- {{ dd($resguardo) }} --}}
                {{csrf_field()}}
                {{method_field('PUT')}}
                
                <div class="form-group">
                    <label for="">número de resguardo</label>
                    <input type="text" value="{{$resguardo->n_resguardo}}" class="form-control" name="n_resguardo" readonly required>
                </div>

                <div class="form-group">
                    <label for="">resguardante</label>
                    <input type="text" value="{{$resguardo->resguardante}}" class="form-control" name="resguardante" required>
                </div>
                <div class="form-group">
                        <label for="">puesto</label>
                        <input type="text" value="{{$resguardo->puesto}}" class="form-control" name="puesto" required>
                    </div>

                    <div class="form-group">
                        <label for="">departamento</label>
                        <select name="departamento_id" class="form-control" required>
                            @foreach($departamentos as $d)
                            <option value="{{$d->id}}" {{($resguardo->departamento_id == $d->id)? 'selected': ''}}>{{$d->departamento}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="">descripcion</label>
                        <input name="descripcion" value="{{$resguardo->descripcion}}"  rows="2" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">extension</label>
                        <input type="text" value="{{$resguardo->extencion}}" class="form-control" name="extencion">
                    </div>

                    {{-- <div class="form-group">
                        <label for="">asignar dispositivo</label>
                        {{-- @foreach ($resguardo->articulos as $item)
                            {{ $item->id }},
                        @endforeach
                        <input type="text" id="skills" data-role="tagsinput" value="{{$resguardo->articulo_id}}" class="form-control" name="articulo_id" placeholder="ingrese el id del dispositivo">
                        {{$resguardo->articulos[0]->id}}
                        <input type="text" value="{{$resguardo->articulo_id}}" class="form-control" name="articulo_id" placeholder="ingrese el id del dispositivo" required>
                    </div> --}}

                   <div class="form-group">
                            <label>archivo</label>
                            <input type="file" value="$reguardo->archivo" class="form-control" name="archivo" enctype="multipart/form-data">
                    </div>
                    
                <div class="form-group">
                    <a type="link" class="btn btn-danger pull-right" href="{{route('resguardos.index')}}">Cancelar</a>
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