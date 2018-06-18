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
      
    <div class="col-sm-10 col-sm-offset-1">
        @include('articulos.create')
        
        @include('info') 
        @include('infob')
      <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>dispositivos en inventario</strong>
        </div>

        <div class="panel-body">
          <p>
            {{$articulos->total ()}} registros | página {{$articulos->currentPage()}} de {{$articulos->lastPage()}}

          </p>
          <table class="table tc table-striped table-bordered table-hover table-condensed table-responsive">


            <!-- <tr>
			   <th colspan="13" bgcolor="#3D9970"><h3 align="center">Inventarios</h3></th>
			 </tr> -->


            <thead>
              <tr>
                <th class="text-center">id</th>
                <th class=" text-center">categoria</th>
                <th class=" text-center">Descripción</th>
                <th class=" text-center" width="20px">Inventario Interno</th>
                <th class=" text-center" width="20px">Inventario Externo</th>
                <th class=" text-center">Serie</th>
                <th class=" text-center">Marca</th>
                <th class=" text-center">Modelo</th>
                <th class=" text-center">Status</th>
                <th class=" text-center">Ubicación</th>

                <!-- <th class=" text-center">Fecha y hora</th> -->
                <th class="text-center" >funciones</th>
              </tr>
            </thead>


            <tbody>
              <!--style="font-size:13px;"-->
              @foreach($articulos as $a)
              <tr>
                <td class="m">{{$a->id}}</td>
                <td class="m">{{$a->categoria->categoria}}</td>
                <td class="m">{{$a->descripcion}}</td>
                <td class="m">{{$a->inv_interno}}</td>
                <td class="m">{{$a->inv_externo}}</td>
                <td class="m">{{$a->serie}}</td>
                <td class="m">{{$a->marca->marca}}</td>
                <td class="m">{{$a->modelo}}</td>
                <td class="m">{{$a->status->status}}</td>
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

                  <!--<a type="link" class="btn btn-info btn-xs pull-right" href="">
                    <i class='glyphicon glyphicon-time'></i></a>-->
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          {{ $articulos->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection