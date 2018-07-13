<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


    <!--<div class="navbar-header">-->

    <!-- Collapsed Hamburger -->
    <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('home') }}">
            <!--{{ config('app.name', 'Laravel') }}-->

            <i class="glyphicon glyphicon-home"></i>
        </a>

        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="{{route('incidencias.index')}}">Incidencias
                    <i class="glyphicon glyphicon-hdd"></i>
                </a>
            </li>
           

            <li class="nav-item dropdown" role="menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gestion
                    <i class="glyphicon glyphicon-signal"></i>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{route('articulos.index')}}">inventario</a>
                    </li>
                    @if (Auth::user()->hasRole('admin'))
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('resguardos.index')}}">Resguardo</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('usuarios.index')}}">Usuarios</a>
                        </li>
                    @endif
                </ul> 
            </li>

            <li class="nav-item">
                <a href="{{route('documentos.index')}}" class="nav-link">Documentos
                    <i class="glyphicon glyphicon-file"></i>
                </a>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item dropdown" role="menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Catalogos
                        <i class="glyphicon glyphicon-list"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('marcas.index')}}">Marcas</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('departamentos.index')}}">departamentos</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Something else here</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Separated link</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">One more separated link</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
        <ul class="nav navbar-nav">
            &nbsp;
        </ul>
        <!--a.dropdown-item{link $}*3-->

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
<<<<<<< HEAD
                <a href="{{ route('register.get') }}" class="nav-link">Registrate
=======
                <a href="{{ route('register.get') }}" class="nav-link">Registrar
>>>>>>> 4cc50781e3e720c0721a79433630823f29eaae0f
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
            </li>
            @endif
            
            @if (Auth::guest())
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Ingresar
                    <i class="glyphicon glyphicon-user"></i>
                </a>
            </li>
           <!-- <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Registrate
                    <i class="glyphicon glyphicon-plus"></i>
                </a> -->
            </li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('config.get') }}">Config</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
        <!--<form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                </form>-->
    </div>

</nav>