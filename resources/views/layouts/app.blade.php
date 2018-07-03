<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>SPF</title>

    <!-- Styles -->

    <!--<link href="{{ asset('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mine.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" /> --}}
    <link href="{{ asset('bootstrap/css/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <style>
        body {
            margin-top: 60px
        }
    </style>


</head>

<body>
    <div id="app">
        @include('layouts.navbar')
                <div>
                  <img src="{{ asset('/img/SPF.png') }}">
                </div> 
        <!-- <div class="container">
            <div class="row"> -->
    </div>
                @yield('content')
            
        <!--</div>
    </div>-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script> --}}
    <script src="{{ asset('bootstrap/js/bootstrap-tagsinput.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#skills').tagsinput({
            confirmKeys: [13, 44]  
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });
        $(".destroy").click(function () {
            event.preventDefault();
            $.ajax({
                url: $(this).attr("href"),
                method: "DELETE",
                success: function (data) {
                    location.reload()
                }
            })

        })
    </script> 
    @yield('scripts')

</body>

</html>