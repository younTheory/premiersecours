@extends("default")
@section('content')
    <div class="bg-danger"> {{ $etape->reponse_negative }}</br>
        Vous avez fait {{ $nberreur  }}
        <?php
            if ($nberreur == 1){
                echo ' erreur';
            }
            else{
                echo ' erreurs';
            }
        ?>
    </div>
    {!!   Form::open(['action' => array('ScenarioController@score')]) !!}
    <div class="form-group">
        {!! Form::hidden('etapes_id', $etape->id) !!}
        <button class="btn btn-success">Score</button>
        {!! Form::close() !!}
        </div>
    <img src="{{ URL::to('/images_scenarios/'. $lien) }}"  width=100%/>

@endsection