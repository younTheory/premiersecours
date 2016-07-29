@extends("default")
@section('content')
    <h1>Créer un compte</h1>
    {!!   Form::open(['method' => 'post', 'url' => route('user.store')]) !!}
    {{ $erreur }}
    <div class="form-group">
        <p>Nom :</p>
        {!! Form::text('nom', "", ['class' => 'form-control']) !!}<br>
    </div>
    <div class="form-group">
        <p>Changer le mot de passe :</p>
        {!! Form::password('pass1', ['class' => 'form-control']) !!}<br>
    </div>
    <div class="form-group">
        <p>Répéter mot de passe :</p>
        {!! Form::password('pass2', ['class' => 'form-control']) !!}<br>
    </div>
    <div class="form-group">
        <p>Email :</p>
        {!! Form::email('email', "", ['class' => 'form-control']) !!}<br>
    </div>
    <div class="form-group">
        <p>Actif :</p>
        {!! Form::select('active', array('0' => 'Non', '1' => 'Oui' ),0, array('class'=>'form-control','style'=>'' )) !!}<br>

    </div>

    <div class="form-group">
        <p>Rôle :</p>
        {!! Form::select('role_id', $roles, 3,array('class'=>'form-control','style'=>'' )) !!}<br>
    </div>
    <button class="btn btn-primary">Créer le compte</button>
    {!! Form::close() !!}

@stop