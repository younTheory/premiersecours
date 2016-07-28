@extends("default")
@section('content')
    <h1>Éditer mon compte </h1>
    {!! $erreur !!}
    {!!   Form::open(['method' => 'put', 'url' => route('profil.update')]) !!}

    <div class="form-group">
        <p>Nom :</p>
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}<br>

    </div>
    <div class="form-group">
        <p>Email :</p>
        {!! Form::label('email', $user->email, ['class' => 'form-control']) !!}<br>

    </div>

    <div class="form-group">
        <p>Changer le mot de passe (laisser blanc si on ne veut pas changer de mot de passe) :</p>
        {!! Form::password('pass1', ['class' => 'form-control']) !!}<br>
    </div>
    <div class="form-group">
        <p>Répéter le nouveau mot de passe :</p>
        {!! Form::password('pass2', ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        <p>Compte activé :</p>
        {!! Form::select('active', array('0' => 'Non', '1' => 'Oui' ),$user->active, array('class'=>'form-control','style'=>'' )) !!}<br>

    </div>

        <button class="btn btn-primary">Modifier</button>
    {!! Form::close() !!}
@stop