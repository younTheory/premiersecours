@extends("defaultinvite")
@section('content')
   <div class="bg-success"> {{ $etape->reponse_positive }}</div>
   <?php
      if ($id == 0) {
   ?>
   {!!   Form::open(['action' => array('ScenarioInviteController@score')]) !!}
   <button class="btn btn-success">Score</button>
   {!! Form::close() !!}
   <?php
      }
      else{
   ?>
   {!!   Form::open(['action' => array('ScenarioInviteController@index')]) !!}
   {!! Form::hidden('etapes_id', $id) !!}
   <button class="btn btn-success">Suivre</button>
   {!! Form::close() !!}
   <?php
      }
   ?>
   <img src="{{ URL::to('/images_scenarios/'. $lien) }}"  width=100%/>
@endsection