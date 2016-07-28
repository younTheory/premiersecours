@extends("defaultinvite")
@section('content')
    <div class="bg-danger"> {{ $etape->reponse_negative }}</br>
    </div>
    {!!   Form::open(['action' => array('ScenarioInviteController@score')]) !!}
    <div class="form-group">
        {!! Form::hidden('etapes_id', $etape->id) !!}
        <button class="btn btn-success">Score</button>
        {!! Form::close() !!}
    <img src="{{ URL::to('/images_scenarios/'. $lien) }}"  width=100%/>

@endsection