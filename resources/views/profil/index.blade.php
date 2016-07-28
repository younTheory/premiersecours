@extends("default")
@section('content')
    <h2> Mon profil </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom</td>
            <td>Email</td>
            <td>Mon score</td>
            <td>Date de création</td>
            <td>Éditer</td>
            <td>Statistiques</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $scoreObtenu }}/ {{ $scoreMax}}</td>
                <td>{{ $user->created_at }}</td>
                <td><a class="btn btn-primary" href="{{ route('profil.edit') }}">Éditer</a></td>
                <td><a class="btn btn-primary" href="{{ route('scoreStat', $user->id) }}">Mes statistiques</a></td>
            </tr>
        </tbody>
    </table>
@stop