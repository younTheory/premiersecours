@extends("defaultinvite")
@section('content')
    <h2> Voici tous les scénarios disponibles </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom du scénario</td>
            <td>Nombre d'étapes</td>
            <td>Points maximums</td>
            <td>Jouer</td>
        </tr>
        </thead>
        <tbody>
        @foreach( $scenarios as $index => $scenario)
            <tr>
                <td>{{ $scenario->nom }}</td>
                <td>{{ $scenario->nb_etape }}</td>
                <td>{{ $scenario->pts_max }}</td>
                {!!   Form::open(['action' => array('ScenarioInviteController@index')]) !!}
                {!! Form::hidden('etapes_id', $etapes[$index][0]->id) !!}
                <td><button class="btn btn-success">Suivre</button></td>
                {!! Form::close() !!}
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection