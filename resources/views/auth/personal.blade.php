@extends('plantilla')

@section('cuerpo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Datos Personales</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay algún problema con la página.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nom" value="{{ Auth::user()->nom }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Apellidos</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cognoms" value="{{ Auth::user()->cognoms }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">DNI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="DNI" value="{{ Auth::user()->nom }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Teléfono</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefon" value="{{ Auth::user()->telefon }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Dirección</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="adreça" value="adreça">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirmar Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Modificar
                                    </button>
                                    <button type="" class="btn btn-primary">
                                        Eliminar
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