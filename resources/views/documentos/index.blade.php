@extends('layouts.app')
@section('content')
 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alt text-center">
          <a href="modal-doc"  class="btn btn-success pull-right" data-toggle="modal" data-target="#" >Nuevo</a>
          <h4><strong class="l">Documentos</strong></h4>
      </div> 
    </div>

<div class="col-sm-8 col-sm-offset-2">
      @include('infob')
      @include('info') 
  <div class="panel panel-primary">
      <div class="panel-heading"> <strong>Docuementos</strong></div>

    <div class="panel-body">
      
      <table  class="table  table-striped table-bordered table-hover table-condensed table-responsive">
          
        
		   	<!-- <tr>
			   <th colspan="13" bgcolor="#3D9970"><h3 align="center">Inventarios</h3></th>
			 </tr> -->
		    

       <thead>
              <tr>
                  <th class="text-center">id</th>
                  <th class=" text-center">Folio</th>
                  <th class=" text-center">Descripción</th>
                  <th class=" text-center">Tipo</th>
                  <th class=" text-center">Adjunto</th>
                  
                  <!--<th>Observaciones</th>-->
                 <!-- <th class=" text-center">Fecha y hora</th> -->
                  <th></th>
              </tr>
            </thead> 
           
          
          <tbody> <!--style="font-size:13px;"-->
            @foreach($documentos as $doc)
              <tr >
                <td class="m">{{$doc->id}}</td>
                  <td class="m">{{$doc->folio}}</td>
                  <td class="m">{{$doc->descripcion}}</td>
                  <td class="m">{{$doc->tipo->tipo}}</td>
                  <td class="m">{{$doc->fecha_doc}}</td>
                  
                  
                  <td>
                    
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