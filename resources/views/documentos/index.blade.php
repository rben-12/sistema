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
      
      <div class="panel-heading"> <strong>Docuementos</strong></div>
      
    <div class="panel-body">
      
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
              </tr>
            </thead> 
           
          
          <tbody> 
            @foreach($documentos as $doc)
              <tr >
                <td class="m">{{$doc->id}}</td>
                  <td class="m">{{$doc->folio}}</td>
                  <td class="m">{{$doc->descripcion}}</td>
                  <td class="m">{{$doc->tipo->tipo}}</td>
                  <td class="m">{{$doc->fecha_doc}}</td>
                  <td class="m">
                    <a href="{{$doc->url}}" target="_blank">
                      @if (pathinfo($doc->url, PATHINFO_EXTENSION) == 'pdf')
                        Ver <img src="{{ asset('img/iconPdf.ico') }}" alt="">
                      @elseif(pathinfo($doc->url, PATHINFO_EXTENSION) == 'docx')
                        Ver <img src="{{ asset('img/iconFileWord.ico') }}" alt="">
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
        </tr>
            @endforeach

          </tbody>
        </table>
      </div> 
    </div>
    </div>
  </div>
</div>
@endsection