@extends("default")
@section('content')
    <h1>Éditer l'utilisateur </h1>
    {!!   Form::open(['method' => 'put', 'url' => route('user.update', $user)]) !!}

        <div class="form-group">
            <p>Nom :</p>
            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}<br>

        </div>
        <div class="form-group">
            <p>Email :</p>
            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}<br>

        </div>
        <div class="form-group">
            <p>Actif :</p>
            {!! Form::select('active', array('0' => 'Non', '1' => 'Oui' ),$user->active, array('class'=>'form-control','style'=>'' )) !!}<br>

        </div>

        <div class="form-group">
            <p>Rôle :</p>
            {!! Form::select('role_id', $roles, $user->role->id,array('class'=>'form-control','style'=>'' )) !!}<br>
        </div>
        <button class="btn btn-primary">Modifier</button>
    {!! Form::close() !!}
@stop