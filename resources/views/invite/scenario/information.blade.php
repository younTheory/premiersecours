@extends("defaultinvite")
@section('content')
    <div class="bg-primary">
        {{ $etape->text }}
    </div>

    <?php
        if ($etape->no_etape != $etape->scenario->nb_etape)
    {
            $id = $etape->etapeSuivante()->id;
        ?>

    </br>
    {!!   Form::open(['action' => array('ScenarioInviteController@index')]) !!}
    {!! Form::hidden('etapes_id', $id) !!}
    <button class="btn btn-success">Suivant</button>
    {!! Form::close() !!}
    <img src="{{ URL::to('/images_scenarios/'. $lien) }}"  width=100%/>
    <?php
        }
        else{

                ?>
    {!!   Form::open(['action' => array('ScenarioInviteController@score')]) !!}
    <div class="form-group">
        {!! Form::hidden('etapes_id', $etape->id) !!}
        <button class="btn btn-success">Score</button>
        {!! Form::close() !!}
    </div>
        <?php
            }
        ?>



@endsection