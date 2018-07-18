@extends('layouts.app') @section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="#" id="launchModal" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-r">Nuevo</a>
                <h4>
                    <strong class="l">resguardo</strong>
                </h4>
            </div>
        </div>
        
        <div class="col-sm-10 col-sm-offset-1">
            @include('resguardos.create')
            @include('infob')
            @include('info')
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>resguardos </strong> <a href="{{ route('pdf', 'resguardo') }}" target="_blank" class="btn btn-info" type="button">Exportar PDF</a>
                    <form class="navbar-form navbar-left pull-right" role="search" action="" style="margin: 0;" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar en resguardo...">
                    </div>
                    <button class="btn btn-info" type="submit">Buscar</button>
                    </form>
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
                                <th class="text-center">Id</th>
                                <th class="text-center">Num. resguardo</th>
                                <th class="text-center">resguardante</th>
                                <th class="text-center">puesto</th>
                                <th class="text-center">departamento</th>
                                <th class="text-center">descripcion</th>
                                <th class="text-center">id dispositivos</th>
                                <th class="text-center">documento</th>
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
                                <td class="m">{{$r->articulo_id}}</td>
                                <td class="m">
                                    <a href="{{$r->archivo}}" target="_blank">
                                        @if (pathinfo($r->archivo, PATHINFO_EXTENSION) == 'pdf')
                                            Ver <img src="{{ asset('img/iconPdf.ico') }}" alt="">
                                        @elseif(pathinfo($r->archivo, PATHINFO_EXTENSION) == 'docx')
                                            Ver <img src="{{ asset('img/iconFileWord.ico') }}" alt="">
                                        @elseif(pathinfo($r->archivo, PATHINFO_EXTENSION) == 'xlsx')
                                            Ver <img src="{{ asset('img/iconFileExcel.png') }}" alt="">
                                        @elseif(pathinfo($r->archivo, PATHINFO_EXTENSION) == 'jpg' || pathinfo($r->archivo, PATHINFO_EXTENSION) == 'png' || pathinfo($r->archivo, PATHINFO_EXTENSION) == 'jpeg')
                                            Ver <img src="{{ asset('img/iconFile.png') }}" alt="">
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    @if (Auth::user()->hasRole('admin'))
                                        {{-- <form action="{{route('resguardos.destroy', $r->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash"></i></button>
                                        </form> --}}
                                        <a href="{{route('resguardos.edit', $r->id)}}" class="btn btn-success btn-xs">
                                            <i class='glyphicon glyphicon-edit'></i>
                                        </a>
                                        <a href="{{route('resguardos.show', $r->n_resguardo)}}" class="btn btn-warning btn-xs">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    @elseif(Auth::user()->id == $r->usuario_id)
                                        {{-- <form action="{{route('resguardos.destroy', $r->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash"></i></button>
                                        </form> --}}
                                        <a href="{{route('resguardos.edit', $r->id)}}" class="btn btn-success btn-xs">
                                            <i class='glyphicon glyphicon-edit'></i>
                                        </a>
                                        <a href="{{route('resguardos.show', $r->n_resguardo)}}" class="btn btn-warning btn-xs">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    @endif
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
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#n_withDocument").on( 'change', function() {
                if( $(this).is(':checked') ) {
                    // Hacer algo si el checkbox ha sido seleccionado
                    $("#n_resguardo").prop( "readonly", false );
                } else {
                    // Hacer algo si el checkbox ha sido deseleccionado
                    $("#n_resguardo").prop( "readonly", true );
                }
            });
            $("#launchModal").click(function(){
                $.ajax({
                    type:'GET',
                    url: '{{ route('getLastResguardo.get') }}',
                    success:function(data){
                        console.log(data);
                        $("#n_resguardo").val(data);
                    },
                    error:function(data){
                        console.log('Error ', data);
                    }
                });
            })
        })
    </script>
@endsection