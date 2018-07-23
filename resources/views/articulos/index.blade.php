@extends('layouts.app') @section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alt">
        <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-a">Nuevo</a>
        <h4>
          <strong class="l">inventario</strong>
        </h4>
      </div>
    </div>
      
    <div class="col-sm-12 col-sm-offset-0">
        @include('articulos.create')
        
        @include('info') 
        @include('infob')
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>dispositivos en inventario </strong> 
          @php
            $buscado;
            $ruta = 'pdf_search';
          @endphp
          @if ($buscado == null)
              @php
                  $buscado = 'inventario';
                  $ruta = 'pdf';
              @endphp
          @endif
          <a href="{{ route($ruta, $buscado) }}" class="btn btn-info" target="_blank">
            Exportar PDF
          </a>
          <form class="navbar-form navbar-left pull-right" role="search" action="{{ route('articulos.index') }}" style="margin: 0;" method="GET">
            <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar articulo...">
            </div>
            <button class="btn btn-info" type="submit">Buscar</button>
          </form>
        </div>

        <div class="panel-body">
          <p>
            {{$articulos->total ()}} registros | página {{$articulos->currentPage()}} de {{$articulos->lastPage()}}

          </p>
        <div class="table-responsive">
          <table class="table tc table-striped table-bordered table-hover table-condensed table-responsive">


            <!-- <tr>
			   <th colspan="13" bgcolor="#3D9970"><h3 align="center">Inventarios</h3></th>
			 </tr> -->


            <thead>
              <tr>
                <th class="text-center" >id</th>
                <th class=" text-center">categoria</th>
                <th class=" text-center" width="150px">Descripción</th>
                <th class=" text-center" width="50px">Inventario Interno</th>
                <th class=" text-center" width="50px">Inventario Externo</th>
                <th class=" text-center" width="30px">Serie</th>
                <th class=" text-center" width="30px">Marca</th>
                <th class=" text-center">Modelo</th>
                <th class=" text-center">Status</th>
                <th class=" text-center" width="150px">Ubicación</th>

                <!-- <th class=" text-center">Fecha y hora</th> -->
                <th class="text-center" width="50px">acciones</th>
              </tr>
            </thead>


            <tbody>
              <!--style="font-size:13px;"-->
           
  
              @foreach($articulos as $a)
              
              {{-- {{ Auth::user() }} --}}
              @if (Auth::user()->hasRole('admin'))
              <tr>
                <td class="m">{{$a->id}}</td>
                <td class="m">{{$a->categoria}}</td>
                <td class="m">{{$a->descripcion}}</td>
                <td class="m">{{$a->inv_interno}}</td>
                <td class="m">{{$a->inv_externo}}</td>
                <td class="m">{{$a->serie}}</td>
                <td class="m">{{$a->marca}}</td>
                <td class="m">{{$a->modelo}}</td>
                <td class="m">{{$a->status}}</td>
                <td class="m">{{$a->ubicacion}}</td>


                <td >
                
                  
                    <form action="{{route('articulos.destroy', $a->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs"> <i class='glyphicon glyphicon-trash'></i></button>
                    </form>

                    <a href="{{route('articulos.edit', $a->id)}}" class="btn btn-success btn-xs">
                      <i class='glyphicon glyphicon-edit'></i></a>

                    <a href="{{route('articulos.show', $a->id)}}" class="btn btn-warning btn-xs">
                      <i class='glyphicon glyphicon-eye-open'></i></a>
                    </td>
                  
                  @elseif (Auth::user()->id == $a->usuario_id)
                  
                    <td class="m">{{$a->id}}</td>
                    <td class="m">{{$a->categoria}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->inv_interno}}</td>
                    <td class="m">{{$a->inv_externo}}</td>
                    <td class="m">{{$a->serie}}</td>
                    <td class="m">{{$a->marca}}</td>
                    <td class="m">{{$a->modelo}}</td>
                    <td class="m">{{$a->status}}</td>
                    <td class="m">{{$a->ubicacion}}</td>
    
    
                    <td >
                    <form action="{{route('articulos.destroy', $a->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs"> <i class='glyphicon glyphicon-trash'></i></button>
                    </form>
                    <a href="{{route('articulos.edit', $a->id)}}" class="btn btn-success btn-xs">
                      <i class='glyphicon glyphicon-edit'></i></a>

                    <a href="{{route('articulos.show', $a->id)}}" class="btn btn-warning btn-xs">
                      <i class='glyphicon glyphicon-eye-open'></i></a>
                    </td>
                  </tr>
                  @endif

                  <!--<a type="link" class="btn btn-info btn-xs pull-right" href="">
                    <i class='glyphicon glyphicon-time'></i></a>-->
                
              
              @endforeach

            </tbody>
          </table>
          {{ $articulos->links() }}
      </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection