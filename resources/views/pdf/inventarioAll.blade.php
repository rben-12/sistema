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
        padding: 10px;
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
<header>
    <div class="left">
        <img src="{{ public_path().$image }}" alt="Logo" height="73px">
    </div>
    <div class="center cen">
        <h1 style="font-size:25px; margin: 0px; ">
            Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br>
        </h1>
    </div>
</header>
    <div class="name" style=" font-size:13px;">
        <div class="left">
            Usuario: {{ Auth::user()->name }}
        </div>
        <div class="right">
            Fecha: {{$ldate = date('d-m-Y')}}
        </div>
    </div>
    {{-- {{dd($tipos)}} --}}
    <table class=" center" style="width:50%">
        <thead>
            <tr>
                <th class="center">Categoria</th>
                <th class=" center">Descripción</th>
                <th class="center">Inventario Interno</th>
                <th class="center">Inventario Externo</th>
                <th class=" center">Serie</th>
                <th class=" center">Marca</th>
                <th class=" center">Modelo</th>
                <th class=" center">Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @if ($tipos==('inventario'))
                @foreach ($data as $a)
                    @if (Auth::user()->hasRole('admin'))
                    <tr>
                        <td class="m">{{$a->categoria->categoria}}</td>
                        <td class="m">{{$a->descripcion}}</td>
                        <td class="m">{{$a->inv_interno}}</td>
                        <td class="m">{{$a->inv_externo}}</td>
                        <td class="m">{{$a->serie}}</td>
                        <td class="m">{{$a->marca->marca}}</td>
                        <td class="m">{{$a->modelo}}</td>
                        <td class="m">{{$a->ubicacion}}</td>  
                    @elseif (Auth::user()->id == $a->usuario_id)
                    <tr>
                        <td class="m">{{$a->categoria->categoria}}</td>
                        <td class="m">{{$a->descripcion}}</td>
                        <td class="m">{{$a->inv_interno}}</td>
                        <td class="m">{{$a->inv_externo}}</td>
                        <td class="m">{{$a->serie}}</td>
                        <td class="m">{{$a->marca->marca}}</td>
                        <td class="m">{{$a->modelo}}</td>
                        <td class="m">{{$a->ubicacion}}</td>  
                    @endif
                @endforeach
            @endif
            @if ($tipos==('inventario_search'))
                @foreach ($data as $a)
                    @if (Auth::user()->hasRole('admin'))
                    <tr>
                        <td class="m">{{$a->categoria}}</td>
                        <td class="m">{{$a->descripcion}}</td>
                        <td class="m">{{$a->inv_interno}}</td>
                        <td class="m">{{$a->inv_externo}}</td>
                        <td class="m">{{$a->serie}}</td>
                        <td class="m">{{$a->marca}}</td>
                        <td class="m">{{$a->modelo}}</td>
                        <td class="m">{{$a->ubicacion}}</td>  
                    @elseif (Auth::user()->id == $a->usuario_id)
                    <tr>
                        <td class="m">{{$a->categoria}}</td>
                        <td class="m">{{$a->descripcion}}</td>
                        <td class="m">{{$a->inv_interno}}</td>
                        <td class="m">{{$a->inv_externo}}</td>
                        <td class="m">{{$a->serie}}</td>
                        <td class="m">{{$a->marca}}</td>
                        <td class="m">{{$a->modelo}}</td>
                        <td class="m">{{$a->ubicacion}}</td>  
                    @endif
                @endforeach
            @endif
        </tbody>
        
    </table>
</body>
</html>