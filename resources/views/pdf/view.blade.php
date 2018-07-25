<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>

    <style>
        thead {
            background: rgba(126, 206, 162, 0.39);
            vertical-align: middle;
        }
        .center{
            text-align: center;
        }
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 2px;
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
        .sizer{
        font-size:11px;    
        }
        .res{
        margin-left: 100px;
        float: left ;
        }
        .auto{
        margin-right: 120px;
        float: right ;
        }
        .res1{ 
        border-top: thin solid;
        width: 180px;
        margin-left: 60px;
        float: left ;
        }
        .auto1{
        border-top: thin solid;
        width: 180px;
        margin-right: 60px;
        float: right ;
        }
        header{
        height: 100px;
        }
        .name{
        height: 35px;
        }
    </style>
</head>

<body>
    @if($tipos!='resguardo_h')
    <!--<div class="row">
        <div class="col-md-2 left">-->
<header>
    <div class="left">
            <img src="{{ public_path().$image }}" alt="Logo" height="73px">
        </div>
        <div class="center cen">
            <h1 style="font-size:25px; margin: 0px; ">
                Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br> 
    @endif
                @if ($tipos == 'incidencias')
                    Reporte de Incidencias
                @elseif($tipos=='inventario')
                    Reporte de Inventario
                @elseif($tipos=='resguardo')
                    Resguardos
    @endif
            </h1>
        </div>
</header>
    @if($tipos!='resguardo_h')
    <!--<div class="row" style="margin: 10px; font-size:15px;">-->
        <div class="name" style=" font-size:13px;">
            <div class="left">
                Usuario: {{ Auth::user()->name }}
            </div>
            <div class="right">
                Fecha: {{$ldate = date('d-m-Y')}}
            </div>
    @endif
        </div>


    @if($tipos=='resguardo_h')
<header>
    <div class="col-md-2 left">
        <img src="{{ public_path().$image }}" alt="Logo" height="60px">
    </div>
    <div class="center cen">
        <h1 style="font-size:20px; margin: 0px; ">
            Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br>
                Resguardo
        </h1>
    </div>
</header>
        <div class="name" style="margin: 10px; font-size:12px;">
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

    <table class=" center" style="width:100%">
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
                    <th class=" center">Ubicación</th>
                @elseif($tipos=='inventario_search')
                    <th class=" center">Categoria</th>
                    <th class=" center">Descripción</th>
                    <th class=" center">Inventario Interno</th>
                    <th class=" center">Inventario Externo</th>
                    <th class=" center">Serie</th>
                    <th class=" center">Marca</th>
                    <th class=" center">Modelo</th>
                    <th class=" center">Ubicación</th>
                @elseif($tipos == 'resguardo_search')
                    <th class="center">Num. resguardo</th>
                    <th class="center">Resguardante</th>
                    <th class="center">Puesto</th>
                    <th class="center">Departamento</th>
                    <th class="center">Descripcion</th>
                @elseif($tipos=='resguardo')
                    <th class="center">Num. resguardo</th>
                    <th class="center">Resguardante</th>
                    <th class="center">Puesto</th>
                    <th class="center">Departamento</th>
                    <th class="center">Descripcion</th>
                @elseif($tipos=='resguardo_h')
                    <th class="center sizer m" width="85px" >Categoria</th>
                    <th class="center sizer m">Descripcion</th>
                    <th class="center sizer m" width="90px">Inventario Interno</th>
                    <th class="center sizer m" width="90px">Inventario externo</th>
                    <th class="center sizer m">Serie</th>
                    <th class="center sizer m">Marca</th>
                    <th class="center sizer m">Modelo</th>    
                @endif
            </tr>
        </thead>
        @foreach ($data as $a)
        <tbody>
            <tr>
                @if ($tipos == 'incidencias')
                    <td class="m">{{$a->asunto}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->encargado->encargado}}</td>
                    <td class="m">{{$a->departamento->departamento}}</td>
                    <td class="m">{{$a->solucion}}</td>
                    <td class="m">{{$a->created_at}}</td>
                @elseif($tipos == 'resguardo_search')
                    <td class="m">{{$a->n_resguardo}}</td>
                    <td class="m">{{$a->resguardante}}</td>
                    <td class="m">{{$a->puesto}}</td>
                    <td class="m">{{$a->departamento}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                @elseif($tipos=='resguardo')
                    <td class="m">{{$a->n_resguardo}}</td>
                    <td class="m">{{$a->resguardante}}</td>
                    <td class="m">{{$a->puesto}}</td>
                    <td class="m">{{$a->departamento->departamento}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                @elseif($tipos=='resguardo_h')
                    <td class="m sizer">{{ $a->categoria->categoria }}</td>
                    <td class="m sizer">{{ $a->descripcion }}</td>
                    <td class="m sizer">{{ $a->serie }}</td>
                    <td class="m sizer">{{ $a->marca->marca }}</td>
                    <td class="m sizer">{{ $a->modelo }}</td>
                    <td class="m sizer">{{ $a->inv_interno }}</td>
                    <td class="m sizer">{{$a->inv_externo}}</td>
                @endif
            </tr>
        </tbody>
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
        <div class="name">
            <div class="res center">
                <strong>Resguardante</strong>
            </div>
            <div class="auto center">
                <strong>Autorizó</strong> 
            </div>
        </div>
        <!--style="margin-top : 40px;"-->
        <div class="name" style="margin-top : 40px;">
            <div class="res1 center sizer">
                {{ $resguardante->resguardante }}
            </div>
            <div class="auto1 center sizer">
                {{ Auth::user()->name }}
            </div>
        </div>
        </footer>
    @endif
</body>
</html>