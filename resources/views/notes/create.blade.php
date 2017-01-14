@extends('plantilla')

@section('cuerpo')

    <h1>Create a note</h1>
    @include('partials/errors')
    <form method="post" action="{{ url('notes') }}" class="form">
        {!! csrf_field() !!}
        {{--aquest old permet mantenir el contingut del camp tot i no enviar-se el formulari. per no perdre el text.--}}
        <textarea name="note" class="form-control" placeholder="Escribe una nota ...">{{ old('note') }}</textarea><br>

        <button type="submit" class="btn btn-primary">Create note</button>

    </form>
@endsection