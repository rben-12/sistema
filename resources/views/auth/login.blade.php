<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>Login</title>

    <!-- Styles -->
    
    <!--<link href="{{ asset('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/login.css')}}" rel="stylesheet">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

</head>
<body>  
    
            <div class="login-page b">
                <div class="form">
                <h4>
                <b class="b">Ingrese al Sistema</b>
                </h4><br>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingrese su E-mail">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Ingrese su Contraseña">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <a>Recordarme</a>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        </div>
                        

                        <div class="form-group">
                                
                            <div>
                                <button type="submit" class="btn btn-primary btn-block btn-flat"> Ingresar</button>
                              </div>
                              <div> <br>
                                <a class="message" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            
    
        <script src="{{ asset('js/app.js') }}"></script>
    
    </body>
</html>
