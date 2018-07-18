
@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="{{route('usuarios.index')}}" class="btn btn-success pull-right" >Listado</a>
                <h4>
                    <strong class="l">Editar usuario</strong>
                </h4>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @include('infob')
            @include('info')
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Editando al usuario: {{ $usuario->name }}</strong></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('usuarios.update', $id) }}">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"  class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Rol de usuario</label>

                            <div class="col-md-6">
                                <select name="rol" class="form-control" required>
                                    <option value="0">Seleccione una opcion</option>
                                    <option value="1"  @if($rol->role_id=="1") selected @endif>Administrador</option>
                                    <option value="2"  @if($rol->role_id=="2") selected @endif>Usuario</option>
                                </select>
                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                        <div class="form-group">
                                <a type="link" class="btn btn-danger right space" href="{{route('usuarios.index')}}">Cancelar</a>
                                <button type="submit" class="btn btn-success right">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
