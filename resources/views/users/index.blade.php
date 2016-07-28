@extends("default")
@section('content')
    <h2> Voici tous les utilisateurs </h2>
    <table class="table table-striped">
        <thead>
            <tr class="info">
                <td>Nom</td>
                <td>Email</td>
                <td>Actif</td>
                <td>Rôle</td>
                <td>Éditer</td>
            </tr>
        </thead>
        <tbody>
        @foreach( $users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->active }}</td>
                <td>{{ $user->role->role }}</td>
                <td><a class="btn btn-primary" href="{{ route('user.edit', $user) }}">Éditer</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
@stop