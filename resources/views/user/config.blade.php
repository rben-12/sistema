
@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alt">
                <a href="{{ route('home') }}" class="btn btn-success pull-right" ><i class="glyphicon glyphicon-home"></i></a>
                <h4>
                    <strong class="l">Cabiar contraseña</strong>
                </h4>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @include('infob')
            @include('info')
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('config.put', Auth::user()->id ) }}">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
