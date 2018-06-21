@extends('layouts.app') @section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alt">
        <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-r">Nuevo</a>
        <h4>
          <strong class="l">resguardo</strong>
        </h4>
      </div>
    </div>
        
<div class="col-sm-8 col-sm-offset-2">
    @include('resguardos.create')
    @include('infob')
    @include('info')
        
    <div class="panel panel-primary">
        <div class="panel-heading">
            <strong>resguardos </strong> 
            <a href="{{ route('pdf', 'resguardo') }}" class="btn btn-info" target="_blank">
                Exportar PDF
            </a>
        </div>
            <div class="panel-body">
                <p>
                    {{$resguardos->total()}} registros|
                    páginas {{$resguardos->currentPage()}} 
                    de {{$resguardos->lastPage()}}
                </p>
                {{-- {{ dd($resguardos) }} --}}
            <table class="table tc  table-striped table-bordered table-hover table-condensed table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Num. resguardo</th>
                        <th class="text-center">resguardante</th>
                        <th class="text-center">puesto</th>
                        <th class="text-center">departamento</th>
                        <th class="text-center">descripcion</th>
                        {{-- <th class="text-center">id asignado</th> --}}
                        {{-- <th class="text-center">inventario interno</th> --}}
                        
                        <th>acciones</th>
                    </tr>
                </thead>    
                <tb>
                @foreach($resguardos as $r)
                    <tr>
                        <td class="m">{{$r->id}}</td>
                        <td class="m">{{$r->n_resguardo}}</td>
                        <td class="m">{{$r->resguardante}}</td>
                        <td class="m">{{$r->puesto}}</td>
                        <td class="m">{{$r->departamento->departamento}}</td>
                        <td class="m">{{$r->descripcion}}</td>
                        {{-- <td class="m">{{$r->articulo->id}}</td> --}}
                        {{-- <td class="m">{{$r->articulo->inv_interno}}</td> --}}
                        <td>
                    
                            <form action="{{route('resguardos.destroy', $r->id)}}" method="POST">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                                <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs"> <i class='glyphicon glyphicon-trash'></i></button>
                            </form>
        
                            <a href="{{route('resguardos.edit', $r->id)}}" class="btn btn-success btn-xs">
                            <i class='glyphicon glyphicon-edit'></i></a>

                            <a href="{{route('resguardos.show', $r->n_resguardo)}}" class="btn btn-info btn-xs">
                                <i class='glyphicon glyphicon-eye-open'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tb>
            </table>
            {{$resguardos->links()}}
        </div>
    </div>
</div>
    </div>
</div>
@endsection