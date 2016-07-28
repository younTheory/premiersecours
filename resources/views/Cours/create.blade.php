

@extends("default")
@section('content')
    <h1>Créer un cours </h1>
    {{ $erreur }}
    {!!   Form::open(['method' => 'post', 'url' => route('cours.store')]) !!}

    <div class="form-group">
        <p>Nom du cours :</p>
        {!! Form::text('nom', '',['class' => 'form-control']) !!}<br>

    </div>

    <div class="form-group">
        <p>Mot de passe pour se connecter au cours :</p>
        {!! Form::password('pass1', ['class' => 'form-control']) !!}<br>

    </div>

    <div class="form-group">
        <p>Répéter le mot de passe :</p>
        {!! Form::password('pass2', ['class' => 'form-control']) !!}<br>

    </div>


    <button class="btn btn-primary">Créer le cours</button>
    {!! Form::close() !!}
@stop