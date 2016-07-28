@extends("default")
@section('content')
   <p> {{ $etape->text }}</p>
   {!!   Form::open(['action' => array('ScenarioController@index', 1)]) !!}
   <div class="form-group">
       @foreach($reponses as $reponse)

       <input type="checkbox" name="rep" value="{{ $reponse->id }}"  >{{ $reponse->reponse }}</br>
       @endforeach
   </div>

   <button class="btn btn-primary">Suivant</button>
   {!! Form::close() !!}
   <img src="{{ URL::to('/images_scenarios/'. $etape->lien_img) }}"  width="1150"/>

@endsection