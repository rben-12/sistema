@extends('layouts.app') @section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alt">
              <a href="{{route('articulos.index')}}" class="btn btn-success pull-right">listado</a>
              <h4>
                <strong class="l">inventario</strong>
              </h4>
            </div>
<div class="col-sm-6 col-sm-offset-3">
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <strong>editar dispositivo</strong>
            <p class="pull-right">#{{$articulo->id}}</p>
        </div>   
    <div class="panel-body">
    <form action="{{route('articulos.update', $articulo)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="">categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $c)
                <option value="{{$c->id}}" {{($articulo->categoria_id == $c->id)? 'selected': ''}}>{{$c->categoria}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Descripción</label>
            <input value="{{$articulo->descripcion}}" type="text" name='descripcion' class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Inventario interno</label>
            <input value="{{$articulo->inv_interno}}" type="text" name='inv_interno' class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Inventario externo</label>
            <input value="{{$articulo->inv_externo}}" type="text" name='inv_externo' class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Numero de serie</label>
            <input value="{{$articulo->serie}}" type="text" name='serie' class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Marca</label>
            <select name="marca_id" class="form-control" required>
                @foreach($marcas as $m)
                <option value="{{$m->id}}" {{($m->id == $articulo->marca_id)? 'selected': ''}}>{{$m->marca}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Modelo</label>
            <input value="{{$articulo->modelo}}" type="text" name='modelo' class="form-control" required>
        </div>


        <div class="form-group">
            <label for="">Status</label>
            <select name="status_id" class="form-control" required>
                @foreach($statuses as $s)
                <option value="{{$s->id}}" {{($s->id == $articulo->status_id)? 'selected':''}}>{{$s->status}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">ip address</label>
            <input type="text" value="{{$articulo->ip_address}}" class="form-control" name="ip_address">
        </div>

        <div class="form-group">
            <label for="">mac address</label>
            <input type="text" value="{{$articulo->mac_address}}" class="form-control" name="mac_address">
        </div>

        <div class="form-group">
            <label for="">Ubicación</label>
            <input value="{{$articulo->ubicacion}}" type="text" name='ubicacion' class="form-control" required>
        </div>

        <div class="form-group">
            <a type="link" class="btn btn-danger pull-right" href="{{route('articulos.index')}}">Cancelar</a>
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
</div>
@endsection