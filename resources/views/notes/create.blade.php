@extends('plantilla')




@section('cuerpo')

    <h1>Create a note</h1>
    <form method="post" action="{{ url('notes') }}" class="form">
        {!! csrf_field() !!}
        <textarea name="note" class="form-control"></textarea><br>

        <button type="submit" class="btn btn-primary">Create note</button>

    </form>
    @endsection