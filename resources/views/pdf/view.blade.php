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

        .text-center {
            text-align: center;
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
        .border {
        border-top-width: thin;
        border-bottom-width: thin;
        border-right-width: thin;
        border-left-width: thin;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-2 left">
            <img src="{{ public_path().$image }}" alt="Logo" height="75px">
        </div>
        <div class="col-md-4 center cen">
            <h1 style="font-size:30px; margin: 0px; ">
                Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br> 
                @if ($tipos == 'incidencias')
                    Reporte de Incidencias
                @elseif($tipos=='inventario')
                    Reporte de Inventario
                @elseif($tipos=='resguardo')
                    Resguardos
                @elseif($tipos=='resguardo_h')
                    Resguardo
                @endif
            </h1>
        </div>
    </div>
    <!--<table class="table">
        <tr>-->
        <div class="row" style="margin: 10px; font-size:15px;">
            <div class="left">
                Usuario: {{ Auth::user()->name }} <br>
                @if($tipos=='resguardo_h')
                   Resguardante: {{ $resguardante->resguardante }}
                @endif
            </div>
            <div class="right">
                Fecha: {{$ldate = date('d-m-Y')}} <br>
                @if($tipos=='resguardo_h')
                    N° de Resguardo: {{ $id }}
                @endif
            </div>
        </div>
    {{-- <table class="table center table-striped table-bordered table-hover table-condensed table-responsive"> --}}
    <table class="table center table-striped table-bordered table-hover table-condensed table-responsive">
        <thead>
            <tr>
                @if ($tipos == 'incidencias')
                    <th class="text-center">Asunto</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Encargado</th>
                    <th class="text-center">Departamento</th>
                    <th class="text-center">Solucion</th>
                    <th class="text-center">Fecha Y Hora</th>

                @elseif($tipos=='inventario')
                    <th class=" text-center">Categoria</th>
                    <th class=" text-center">Descripción</th>
                    <th class=" text-center">Inventario Interno</th>
                    <th class=" text-center">Inventario Externo</th>
                    <th class=" text-center">Serie</th>
                    <th class=" text-center">Marca</th>
                    <th class=" text-center">Modelo</th>
                    <th class=" text-center">Status</th>
                    <th class=" text-center">Ubicación</th>
                @elseif($tipos=='inventario_search')
                    <th class=" text-center">Categoria</th>
                    <th class=" text-center">Descripción</th>
                    <th class=" text-center">Inventario Interno</th>
                    <th class=" text-center">Inventario Externo</th>
                    <th class=" text-center">Serie</th>
                    <th class=" text-center">Marca</th>
                    <th class=" text-center">Modelo</th>
                    <th class=" text-center">Status</th>
                    <th class=" text-center">Ubicación</th>
                @elseif($tipos=='resguardo')
                    <th class="text-center">Num. resguardo</th>
                    <th class="text-center">Resguardante</th>
                    <th class="text-center">Puesto</th>
                    <th class="text-center">Departamento</th>
                    <th class="text-center">Descripcion</th>
                @elseif($tipos=='resguardo_h')
                    <th class="text-center">Cant</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Inv Interno</th>
                    <th class="text-center">Inv externo</th>
                @endif
            </tr>
        </thead>
        @foreach ($data as $a)
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
                    <td class="m">1</td>
                    <td class="m">{{ $a->descripcion }}</td>
                    <td class="m">{{ $a->serie }}</td>
                    <td class="m">{{ $a->marca->marca }}</td>
                    <td class="m">{{ $a->modelo }}</td>
                    <td class="m">{{ $a->inv_interno }}</td>
                    <td class="m">{{$a->inv_externo}}</td>
                @endif
            </tr>
        </tbody>
        @endforeach
    </table>
    @if ($tipos=='resguardo_h')
        <footer class="footer">
            <table class="center">
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
                    <td>
                        <u>{{ $resguardante->resguardante }}</u>
                    </td>
                    <td>
                        <u>{{ Auth::user()->name }}</u>
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
            </table>
        </footer>
    @endif
</body>
</html>