@extends('layouts.app')
@section('content')
 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alt text-center">
          <a href="#"  class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-doc" >Nuevo</a>
          <h4><strong class="l">Documentos</strong></h4>
      </div> 
    </div>

<div class="col-sm-8 col-sm-offset-2">
      @include('documentos.create')
      @include('infob')
      @include('info') 
  <div class="panel panel-primary">
      <div class="panel-heading"> <strong>Documentos</strong>
        <a target="_blank" class="btn btn-info" href="{{ route('unisharp.lfm.show') }}"> Manager
          <i class="glyphicon glyphicon-file"></i></a>

        <form class="navbar-form navbar-left pull-right" role="search" action="{{route('documentos.index')}}" style="margin: 0;" method="GET">
            <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar articulo...">
            </div>
            <button class="btn btn-info" type="submit">Buscar</button>
          </form>
      </div>

    <div class="panel-body">
        <p>
            {{$documentos->total ()}} registros | 
            página {{$documentos->currentPage()}} 
            de {{$documentos->lastPage()}}

          </p>
    <div class="table-responsive">
      <table  class="table text-center table-striped table-bordered table-hover table-condensed table-responsive">
          
       <thead>
              <tr>
                  <th class="text-center">id</th>
                  <th class=" text-center">Folio</th>
                  <th class=" text-center">Descripción</th>
                  <th class=" text-center">Tipo</th>
                  <th class="text-center">fecha docs</th>
                  <th class=" text-center">Archivo</th>
                  <th class=" text-center">Tipo de archivo</th>
                  <th class=" text-center">Acciones</th>
              </tr>
            </thead> 
           
          
          <tbody> 
            @foreach($documentos as $doc)
              <tr id="id{{$doc->id}}">
                <td class="m">{{$doc->id}}</td>
                  <td class="m">{{$doc->folio}}</td>
                  <td class="m">{{$doc->descripcion}}</td>
                  <td class="m">{{$doc->tipo}}</td>
                  <td class="m">{{$doc->fecha_doc}}</td>
                  <td class="m">
                    <a href="{{$doc->url}}" target="_blank">
                      @if (pathinfo($doc->url, PATHINFO_EXTENSION) == 'pdf')
                        Ver <img src="{{ asset('img/iconPdf.ico') }}" alt="">
                      @elseif(pathinfo($doc->url, PATHINFO_EXTENSION) == 'docx' || pathinfo($doc->url, PATHINFO_EXTENSION)=='doc')
                        Descargar <img src="{{ asset('img/iconFileWord.ico') }}" alt="">
                      @elseif(pathinfo($doc->url, PATHINFO_EXTENSION) == 'xlsx')
                        Ver <img src="{{ asset('img/iconFileExcel.png') }}" alt="">
                      @elseif(pathinfo($doc->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($doc->url, PATHINFO_EXTENSION) == 'png' || pathinfo($doc->url, PATHINFO_EXTENSION) == 'jpeg')
                        Ver <img src="{{ asset('img/iconFile.png') }}" alt="">
                      @endif
                    </a>
                  </td>
                  <td>
                      {{ pathinfo($doc->url, PATHINFO_EXTENSION) }}
                  </td>
                  <td>
                    <a href="{{ route('documentos.edit', $doc->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                    <button class="delete btn btn-danger btn-xs" data-id="{{ $doc->id }}" data-url="{{ route('documentos.destroy', $doc->id) }}" >
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                  </td>
              </tr>
            @endforeach

          </tbody>
        </table>
        {{ $documentos->links() }}
      </div>
      </div> 
    </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script>
      $(document).ready(function(){
        $(".delete").click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).data("id");
                var url = $(this).data("url");

                var opcion = confirm("Clicka en Aceptar o Cancelar");
                if (opcion == true) {
                    $.ajax({
                        url: url,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id
                        },
                        success: function (data)
                        {
                            $('#id'+id).remove();
                            // console.log(data);
                            $("#respuestaJson").html(data+'<button type="button" class="close" data-dismiss="alert">'+
                                                                '&times;'+
                                                           '</button>').show();

                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
      })
    </script>
@endsection