@extends("default")
@section('content')
    <h2> Voici tous les scénarios concernant le cours {{ $nom }} : </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom du scénario</td>
            <td>Nombre d'étapes</td>
            <td>Cours</td>
        </tr>
        </thead>
        <tbody>
        @foreach( $scenariosCours as $index => $scenario)
            <tr>
                <td>{{ $scenario->nom }}</td>
                <td>{{ $scenario->nb_etape }}</td>
                {!!   Form::open(['action' => array('CoursController@storeAcces', $id)]) !!}
                <?php
                if($scenario->pivot->active == 0)
                    {
                        ?>
                {!! Form::hidden('active', 1) !!}
                <td><button class="btn btn-success">Ajouter scénario au cours</button></td>
                <?php
                    }
                else{

                ?>
                {!! Form::hidden('active', 0) !!}
                <td><button class="btn btn-danger">Enlever scénario du cours</button></td>
                <?php } ?>
                {!! Form::hidden('scenario_id', $scenario->id) !!}
                {!! Form::hidden('cours_id', $id) !!}
                {!! Form::close() !!}
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection