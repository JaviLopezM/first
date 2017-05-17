@extends('plantilla')

@section('cuerpo')


    <section class="row new-post">
        <header>
            <h3 style="margin-left: 16px">Perfil de {{ $user->nombre }}</h3>
        </header>
        <div class="col-md-offset-2">
            {{--<section class="row new-post">--}}

                        <div class="col-md-4" style="float: left; margin-top: 5em; ">
                            <img src="/images/default.jpg" class="img-rounded " width="200" height="200" >
                        </div>

                <div class="col-md-6">
                    <header>
                        <h3>Datos del perfil</h3>
                    </header>
                    <form action="{{route('Actualizar')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $user->nombre }}" id="nombre">
                        </div>
                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : '' }}">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="{{ $user->apellidos }}" id="apellidos">
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Correu</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="email">
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                            <label for="adreca">Dirección</label>
                            <input type="text" name="direccion" class="form-control" value="{{ $user->direccion }}" id="direccion">
                        </div>
                        {{--Preparo per poder pujar imatge de perfil--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="imagen">Imagen </label>--}}
                            {{--<input type="file" name="imagen" class="form-control" id="imagen">--}}
                        {{--</div>--}}

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <br>
                    </form>
                    <br>



                </div>
            </section>
        </div>
    </section>
    @endsection