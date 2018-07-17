<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        thead {
            background: rgba(126, 206, 162, 0.247);
            vertical-align: middle;
        }
        .center{
            text-align: center;
        }
        /* Sticky footer styles
-------------------------------------------------- */
        html {
        position: relative;
        min-height: 100%;
        }
        body {
        /* Margin bottom by footer height*/
        margin-bottom: 60px;
        }
        .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
        }

        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        .container {
        width: auto;
        max-width: 680px;
        padding: 0 15px;
        }
        .container .text-muted {
        margin: 20px 0;
        }
        .m{
        text-transform: uppercase;
        }
        .left {
        float: left !important;
        }
        .right {
        float: right !important;
        }
        .cen {
        float: center ;
        }
        .size {
        font-size:12px;
        }
        .res{
        margin-left: 70px;
        float: left ;
        }
        .auto{
        margin-right: 80px;
        float: right ;
        }
        .res1{ 
        border-top: thin solid;
        width: 110px;
        margin-left: 60px;
        float: left ;
        }
        .auto1{
        border-top: thin solid;
        width: 110px;
        margin-right: 60px;
        float: right ;
        }
    </style>
</head>

<body>
    @if($tipos!='resguardo_h')
    <div class="row">
        <div class="col-md-2 left">
            <img src="{{ public_path().$image }}" alt="Logo" height="75px">
        </div>
        <div class="col-md-4 center cen">
            <h1 style="font-size:30px; margin: 0px; ">
                Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br> 
    @endif
                @if ($tipos=='incidencias')
                    Reporte de Incidencias
                @elseif($tipos=='inventario')
                    Reporte Total de Inventario
                @elseif($tipos=='inventario_search')
                    Reporte de Inventario
                @elseif($tipos=='resguardo')
                    Resguardos
    @endif
            </h1>
        </div>
    </div>
    @if($tipos!='resguardo_h')
    <div class="row" style="margin: 10px; font-size:15px;">
            <div class="left">
                Usuario: {{ Auth::user()->name }}
            </div>
            <div class="right">
                Fecha: {{$ldate = date('d-m-Y')}}
            </div>
    @endif
        </div>


    @if($tipos=='resguardo_h')
    <div class="row">
    <div class="col-md-2 left">
        <img src="{{ public_path().$image }}" alt="Logo" height="60px">
    </div>
    <div class="col-md-4 center cen">
        <h1 style="font-size:25px; margin: 0px; ">
            Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br>
                Resguardo
        </h1>
    </div>
    </div>
        <div class="row" style="margin: 10px; font-size:15px;">
            <div class="left size">
                    Usuario: {{ Auth::user()->name }} <br>
                    Resguardante: {{ $resguardante->resguardante }}
            </div>  
            <div class="right size">
                    Fecha: {{$ldate = date('d-m-Y')}} <br>
                    N° de Resguardo: {{ $id }}
            </div>
    @endif
        </div>

    {{-- <table class="table center table-striped table-bordered table-hover table-condensed table-responsive"> --}}
    <table class="table center table-striped table-bordered table-hover table-condensed table-responsive">
        <thead>
            <tr>
                @if ($tipos == 'incidencias')
                    <th class="center">Asunto</th>
                    <th class="center">Descripción</th>
                    <th class="center">Encargado</th>
                    <th class="center">Departamento</th>
                    <th class="center">Solucion</th>
                    <th class="center">Fecha Y Hora</th>

                @elseif($tipos=='inventario')
                    <th class=" center">Categoria</th>
                    <th class=" center">Descripción</th>
                    <th class=" center">Inventario Interno</th>
                    <th class=" center">Inventario Externo</th>
                    <th class=" center">Serie</th>
                    <th class=" center">Marca</th>
                    <th class=" center">Modelo</th>
                    <th class=" center">Status</th>
                    <th class=" center">Ubicación</th>
                @elseif($tipos=='inventario_search')
                    <th class=" center">Categoria</th>
                    <th class=" center">Descripción</th>
                    <th class=" center">Inventario Interno</th>
                    <th class=" center">Inventario Externo</th>
                    <th class=" center">Serie</th>
                    <th class=" center">Marca</th>
                    <th class=" center">Modelo</th>
                    <th class=" center">Status</th>
                    <th class=" center">Ubicación</th>
                @elseif($tipos=='resguardo')
                    <th class="center">Num. resguardo</th>
                    <th class="center">Resguardante</th>
                    <th class="center">Puesto</th>
                    <th class="center">Departamento</th>
                    <th class="center">Descripcion</th>
                @elseif($tipos=='resguardo_h')
                    <th class="center size m" width="85px" >Categoria</th>
                    <th class="center size m">Descripcion</th>
                    <th class="center size m">Serie</th>
                    <th class="center size m">Marca</th>
                    <th class="center size m">Modelo</th>
                    <th class="center size m" width="90px">Inventario Interno</th>
                    <th class="center size m" width="90px">Inventario externo</th>
                @endif
            </tr>
        </thead>
        @foreach ($data as $a)
        @if(Auth::user()->id==$a->usuario_id)
        <tbody>
            <tr>
                @if ($tipos == 'incidencias')
                    <td class="m">{{$a->asunto->asunto}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->encargado->encargado}}</td>
                    <td class="m">{{$a->departamento->departamento}}</td>
                    <td class="m">{{$a->solucion}}</td>
                    <td class="m">{{$a->created_at}}</td>
                @elseif($tipos=='inventario')
                    <td class="m">{{$a->categoria->categoria}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->inv_interno}}</td>
                    <td class="m">{{$a->inv_externo}}</td>
                    <td class="m">{{$a->serie}}</td>
                    <td class="m">{{$a->marca->marca}}</td>
                    <td class="m">{{$a->modelo}}</td>
                    <td class="m">{{$a->status->status}}</td>
                    <td class="m">{{$a->ubicacion}}</td>
                @elseif($tipos=='inventario_search')
                    <td class="m">{{$a->categoria}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->inv_interno}}</td>
                    <td class="m">{{$a->inv_externo}}</td>
                    <td class="m">{{$a->serie}}</td>
                    <td class="m">{{$a->marca}}</td>
                    <td class="m">{{$a->modelo}}</td>
                    <td class="m">{{$a->status}}</td>
                    <td class="m">{{$a->ubicacion}}</td>
                @elseif($tipos=='resguardo')
                    <td class="m">{{$a->n_resguardo}}</td>
                    <td class="m">{{$a->resguardante}}</td>
                    <td class="m">{{$a->puesto}}</td>
                    <td class="m">{{$a->departamento->departamento}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                @elseif($tipos=='resguardo_h')
                    <td class="m size">{{ $a->categoria->categoria }}</td>
                    <td class="m size">{{ $a->descripcion }}</td>
                    <td class="m size">{{ $a->serie }}</td>
                    <td class="m size">{{ $a->marca->marca }}</td>
                    <td class="m size">{{ $a->modelo }}</td>
                    <td class="m size">{{ $a->inv_interno }}</td>
                    <td class="m size">{{$a->inv_externo}}</td>
                @endif
            </tr>
        </tbody>
        @endif
        @endforeach
    </table>
    @if ($tipos=='resguardo_h')
        <footer class="footer">
            <!--<table class="center">
                <tr>
                    <td width="250">
                        <strong>Resguardante</strong>
                    </td>
                    <td width="250">
                        <strong>Autorizó</strong>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                </tr>
                <tr>
                    <td >
                    <div class="res">
                        
                    </div>
                    </td>
                    <td>
                    <p class="auto">
                       
                    </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Nombre y firma</strong>
                    </td>
                    <td>
                        <strong>Jefe del Depto de soporte a redes <br> y telefonia</strong>
                    </td>
                </tr>
            </table>-->
        <div class="row">
            <div class="res center">
                <strong>Resguardante</strong>
            </div>
            <div class="auto center">
                <strong>Autorizó</strong> 
            </div>
        </div>
        <!--style="margin-top : 40px;"-->
        <div class="row" style="margin-top : 40px;">
            <div class="res1 center">
                {{ $resguardante->resguardante }}
            </div>
            <div class="auto1 center">
                {{ Auth::user()->name }}
            </div>
        </div>
        </footer>
    @endif
</body>
</html>