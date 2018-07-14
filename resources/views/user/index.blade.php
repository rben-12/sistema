@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="{{ route('register.get') }}" class="btn btn-success pull-right" ><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
                <h4>
                    <strong class="l">Lista de usuario</strong>
                </h4>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @include('infob')
            @include('info')
            <div class="alert alert-success" hidden id="respuestaJson">
                
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>usuarios </strong>
                </div>
                <div class="panel-body">
                    <p>
                        {{$usuarios->total()}} registros|
                        páginas {{$usuarios->currentPage()}} 
                        de {{$usuarios->lastPage()}}
                    </p>
                    <table class="table tc  table-striped table-bordered table-hover table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Fecha de registro</th>
                                <th class="text-center">Rol</th>
                                <th class="text-center">acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $item)
                                <tr id="id{{$item->id}}" class="">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a href="{{ route('usuarios.edit', $item->id) }}" class="btn btn-info btn-xs">
                                            <i class='glyphicon glyphicon-edit'></i>
                                        </a>
                                        <button class="delete btn btn-danger btn-xs" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" data-url="{{ route('usuarios.destroy', $item->id) }}" >
                                            <i class='glyphicon glyphicon-trash'></i>
                                        </button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
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