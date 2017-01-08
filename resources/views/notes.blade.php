@extends('plantilla')

@section('cabecera')
    <h1>Javier López</h1>
    <p><h2>Notes</h2></p>

@endsection
@section('cuerpo')
    <h1>Notes</h1>
<ul>
    <!-- $notes és una col·lecció de notes
    i dins ho ha diferents tipus de notes $note
    i cada $note és un objecte -->

    @foreach ($notes as $note)
        <li>
            {{ $note -> note }}
            <!-- La linia anterior equival a -->
            <!-- <?php echo $note -> note ?> -->
        </li>
    @endforeach
</ul>

    <form method="post">
        <!-- La següent línia equival a la a la etiqueta input per a adquirir el token.-->
        {!! csrf_field() !!}
        <!-- Per seguretat es necesari afegir un camp token per
         verificar la identitat de l'enviament de dades-->
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <textarea></textarea><br>
        <button type="submit">Create notes</button>

    </form>
@endsection