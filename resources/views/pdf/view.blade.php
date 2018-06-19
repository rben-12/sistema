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
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-2">
            <img src="{{ public_path().$image }}" alt="Logo" height="75px">
        </div>
        <div class="center col-md-4">
            <h1>Secretaria de Planeacion y Finanzas <br> Direccion de Informatica <br> Reporte de Bienes</h1>
        </div>
        <div></div>
    </div>
    <table class="table tc table-striped table-bordered table-hover table-condensed table-responsive">
        <thead>
            <tr>
                @if ($tipos == 'incidencias')
                    <th class="text-center">Asunto</th>
                    <th class=" text-center">Descripción</th>
                    <th class=" text-center">Encargado</th>
                    <th class=" text-center">Departamento</th>
                    <th class=" text-center">Solucion</th>
                    <th class=" text-center">Fecha Y Hora</th>

                @elseif($tipos=='inventario')
                    <th class="text-center">id</th>
                    <th class=" text-center">categoria</th>
                    <th class=" text-center">Descripción</th>
                    <th class=" text-center" width="20px">Inventario Interno</th>
                    <th class=" text-center" width="20px">Inventario Externo</th>
                    <th class=" text-center">Serie</th>
                    <th class=" text-center">Marca</th>
                    <th class=" text-center">Modelo</th>
                    <th class=" text-center">Status</th>
                    <th class=" text-center">Ubicación</th>
                @elseif($tipos=='resguardo')
                    <th class="text-center">#</th>
                    <th class="text-center">Num. resguardo</th>
                    <th class="text-center">resguardante</th>
                    <th class="text-center">puesto</th>
                    <th class="text-center">departamento</th>
                    <th class="text-center">descripcion</th>
                    <th class="text-center">id asignado</th>
                    <th class="text-center">inventario interno</th>
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
                    <td class="m">{{$a->id}}</td>
                    <td class="m">{{$a->categoria->categoria}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->inv_interno}}</td>
                    <td class="m">{{$a->inv_externo}}</td>
                    <td class="m">{{$a->serie}}</td>
                    <td class="m">{{$a->marca->marca}}</td>
                    <td class="m">{{$a->modelo}}</td>
                    <td class="m">{{$a->status->status}}</td>
                    <td class="m">{{$a->ubicacion}}</td>
                @elseif($tipos=='resguardo')
                    <td class="m">{{$a->id}}</td>
                    <td class="m">{{$a->n_resguardo}}</td>
                    <td class="m">{{$a->resguardante}}</td>
                    <td class="m">{{$a->puesto}}</td>
                    <td class="m">{{$a->departamento->departamento}}</td>
                    <td class="m">{{$a->descripcion}}</td>
                    <td class="m">{{$a->articulo->id}}</td>
                    <td class="m">{{$a->articulo->inv_interno}}</td>
                @endif
            </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>