@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alt">
                  <h4>
                    <strong class="l">detalle del resguardo n°{{ $id }}</strong>
                    <input type="hidden" name="nResguardo" id="nResguardo" value="{{ $id }}">
                  </h4>
                </div>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                @include('info') 
                @include('infob')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>resguardos asignados a: {{ $resguardante->resguardante }}</strong>
                        <a href="{{ route('pdf_h', $id) }}" target="_blank" class="btn btn-info">
                            Exportar PDF
                        </a>
                    </div>
                    <div class="panel-body">
                        <div>
                            <a href="#" data-toggle="modal" data-target="#searchToAdd" class="btn btn-info btn-xs">
                                {{-- {{ route('articulos.get') }} --}}
                                Asignar articulo
                            </a>
                        </div> <br>
                        <table class="table tc table-striped table-bordered table-hover table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">Cant</th>
                                    <th class="text-center">Descripcion</th>
                                    <th class="text-center">Serie</th>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Inv interno</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resguardoShow as $item)
                                    <tr>
                                        <td>1</td>
                                        <td class="m">{{ $item->descripcion }}</td>
                                        <td class="m">{{ $item->serie }}</td>
                                        <td class="m">{{ $item->marca->marca }}</td>
                                        <td class="m">{{ $item->modelo }}</td>
                                        <td class="m">{{ $item->inv_interno }}</td>
                                        <td>
                                            <form action="{{ route('artDeleteRes.delete', $item->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs"> <i class='glyphicon glyphicon-trash'></i></button>
                                            </form>
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
    {{-- modal to search --}}
    <div class="modal fade" id="searchToAdd">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                        <h4>Agregar nuevo resguardo</h4>    
                    </div>
            
                    <div class="modal-body">
                        <form action="{{route('resguardos.store')}}" method="POST">
                            {{-- {{csrf_field()}} --}}
                            <meta name="_token" content="{!! csrf_token() !!}" />
                            <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Ingrese N° de inventario">
                                <span class="input-group-btn">
                                    <button id="buscar" class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <div id="listaGet">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('input').keypress(function(e){
                if(e.which == 13){
                    e.preventDefault();
                    buscar();
                }
            });
            $('#buscar').click(function(e){
                e.preventDefault();
                buscar();
            });
            function buscar(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var formData = {
                    busqueda : $("#busqueda").val()
                }
                $.ajax({
                    type: 'GET',
                    url: '{{ route('articulos.get') }}',
                    data: formData,
                    success:function(data){
                        //console.log(data[0]);
                        var boton = '';
                        if (data[0]=== undefined || data[0] === null) {
                            $('#listaGet').html('No hay registros que coincidan');
                        }
                        else if (data[0].resguardo_id==null || data[0].resguardo_id==0) {
                            boton = "<button id='agregar' data-id='"+data[0].id+"' class='agregar btn btn-xs btn-info'><i class='glyphicon glyphicon-plus'></i></button>";
                        }
                        else{
                            boton="ya se asigno";
                        }
                        var table = "<table class='table'>"+
                                        "<thead>"+
                                            "<tr>"+
                                                "<th>Descripcion</th>"+
                                                "<th>Modelo</th>"+
                                                "<th>Inv interno</th>"+
                                                "<th>Inv externo</th>"+
                                                "<th>Accion</th>"+
                                            "</tr>"+
                                        "</thead>"+
                                        "<tbody>"+
                                            "<tr id='"+data[0].id+"'>"+
                                                "<td>"+data[0].descripcion+"</td>"+
                                                "<td>"+data[0].modelo+"</td>"+
                                                "<td>"+data[0].inv_interno+"</td>"+
                                                "<td>"+data[0].inv_externo+"</td>"+
                                                "<td>"+boton+"</td>"+
                                            "</tr>"+
                                        "</tbody>"+
                                    "</table>";
                        $('#listaGet').html(table);
                        //console.log(table);
                    },
                    error:function(data)
                    {
                        console.log('Error', data);
                    }
                });
            }
            $(document).on('click', '#listaGet .agregar', function(){ 
                // Your Code
                var id = $(this).data('id');
                // console.log(id);
                var data = {
                    id: id,
                    nResguardo: $("#nResguardo").val()
                }

                $.ajax({
                    type:'POST',
                    url: '{{ route('artAddRes.add') }}',
                    data: data,
                    success:function(data){
                        // console.log(data);
                        location.reload();
                    },
                    error:function(data){
                        console.log('Error: ', data);
                    }
                })
            });
        });
    </script>
@endsection