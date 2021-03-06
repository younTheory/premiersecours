@extends("defaultinvite")
@section('content')
    <div class="bg-primary">
        {{ $etape->text }}
        {!!   Form::open(['action' => 'ScenarioInviteController@store', 'id' => 'redirect']) !!}
        {!! Form::hidden('etapes_id', $etape->id) !!}
        <div class="form-group">
            @foreach($reponses as $reponse)

                <input type="checkbox" name="rep[]" value="{{ $reponse->id }}"  >{{ $reponse->reponse }}</br>
            @endforeach
        </div>
    </div>
    <button class="btn btn-success">Suivant</button>
    {!! Form::close() !!}
    <div id="dvCountDown" style="display: none">
        Vous avez encore <span id="lblCount"></span>&nbsp;secondes.
    </div>
    <script>
        window.onload=function(){
            var secondes = <?php echo $etape->temps ?>;
            $("#dvCountDown").show();
            $("#lblCount").html(secondes);
            setInterval(function () {
                secondes--;
                $("#lblCount").html(secondes);
                if (secondes == 0) {
                    $("#dvCountDown").hide();
                    window.document.getElementById("redirect").submit();
                }
            }, 1000);

        };
    </script>


    <img src="{{ URL::to('/images_scenarios/'. $lien) }}"  width=100%/>

@endsection