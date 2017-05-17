@extends('plantilla')

@section('cuerpo')

<section>

    <table class="table table-striped task-table">
        {!! csrf_field() !!}

        <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>eliminar</th>
        </thead>
        <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{--<a href="{{  url('user', [$user->id])}}" class="btn btn-danger"--}}
                           {{--data-method="delete" data-confirm="Estás seguro de eliminar este usuario?">--}}
                            {{--Delete--}}
                        {{--</a>--}}
                        {!! Form::open(['method' => 'POST','route' => ['eliminar', $user->id]]) !!}
                        {!! csrf_field() !!}
                        {!! Form::submit('eliminar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>




            @endforeach
            {{--Si vull mostrar el total d'usuaris--}}
            {{--{!! $users->total()!!}--}}

        </tbody>

    </table>
    {!! $users->render() !!}

</section>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
<script src="/js/laravel.js"></script>

@endsection