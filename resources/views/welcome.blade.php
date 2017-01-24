@extends('plantilla')


@section('cuerpo')
<h1>Inicio</h1>

    {{--@if(Auth::guest())--}}
    {{--<li><a href="{{route('login')}}">Login</a></li>--}}
    <li><a href="auth/register">Registro</a></li>


{{--@else--}}
    {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
            {{--{{Auth::user()->name}}<span class="caret"></span>--}}
        {{--</a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="auth/logout">Logout</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}

<div style="width: 30%; float: right">
<form class="form-horizontal" role="form" method="POST" action="auth/login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">{{ trans('validation.attributes.email') }}</label>
        <div class="col-md-6">
            {!! Form::text('email', null, ['class' => 'form-control', 'type' => 'email']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">{{ trans('validation.attributes.password') }}</label>
        <div class="col-md-6">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Recuerdame
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                Login
            </button>

            <a href="/password/email">Has olvidado el password?</a>
        </div>
    </div>
</form>
</div>
    @endsection