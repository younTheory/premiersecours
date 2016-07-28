@extends("defaultinvite")
@section('content')
    <div class="bg-primary">
        {{ $etape->text }}
        {!!   Form::open(['action' =>'ScenarioInviteController@store', 'id' => 'redirect']) !!}
        {!! Form::hidden('etapes_id', $etape->id) !!}
        <div class="form-group">
            <?php
            $nb = count($reponses);
                $width = 95/$nb;
                $width = $width . '%';
            ?>
        </div>
    </div>

            @foreach($reponses as $reponse)

                <input type="radio" name="rep" value="{{ $reponse->id }}"  ><img src="{{ URL::to('/images_scenarios/'. $reponse->reponse) }}"  width={{$width}}/>
            @endforeach


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

@endsection