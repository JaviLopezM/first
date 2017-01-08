@extends('plantilla')


@section('cuerpo')
    <h1>List</h1>
    <a href="{{ url('notes/create') }}">Add a note</a><br>
    <hr>
    <ul>
       @foreach ($notes as $note)
            <li>
            {{ $note -> note }}
            <!-- La linia anterior equival a -->
            <!-- <?php echo $note -> note ?> -->
            </li>
        @endforeach
    </ul>

@endsection