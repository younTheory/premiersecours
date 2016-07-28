@extends("default")
@section('content')
    <h2> Voici tous vos cours : </h2>
    <td><a class="btn btn-primary" href="{{ route('cours.create') }}">Créer un nouveau cours</a></td>
    <table class="table table-striped">
        <thead>
            <tr class="info">
                <td>Nom</td>
                <td>Date de création</td>
                <td>Email</td>
                <td>État</td>
                <td>Statistiques du cours</td>
                <td>Éditer le cours</td>
                <td>Accès du cours aux scénarios</td>
            </tr>
        </thead>
        <tbody>
        @foreach( $cours as $cour)
            <tr>
                <td>{{ $cour->nom }}</td>
                <td>{{ $cour->created_at }}</td>
                <td>{{ $cour->invite->email }}</td>
                <td> {{ $cour->etat->nom }} </td>
                <td><a class="btn btn-primary" href="{{ route('cours.statistique', $cour) }}">Voir statistiques</a></td>
                <td><a class="btn btn-primary" href="{{ route('cours.edit', $cour) }}">Éditer</a></td>
                <td><a class="btn btn-primary" href="{{ route('cours.acces.edit', $cour) }}">Éditer</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
@stop