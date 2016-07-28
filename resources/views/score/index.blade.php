@extends("default")
@section('content')
    <h2> Voici tous les scores de tous les utilisateurs </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom</td>
            <td>Points</td>
            <td>Statistiques</td>
        </tr>
        </thead>
        <tbody>
        @foreach( $users as $index => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->getScore() }} /{{ $scoreMax }} </td>
                <td><a class="btn btn-primary" href="{{ route('scoreStat', $user->id) }}">Statistiques</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>








@endsection