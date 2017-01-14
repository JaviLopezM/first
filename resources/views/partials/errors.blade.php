@if (! $errors->isEmpty())
    <div class="alert-danger">
        <p><strong>Oooops!</strong> Por fabor revisa los siguientes errores</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif