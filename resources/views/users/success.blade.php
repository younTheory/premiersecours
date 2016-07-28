@extends("default")
@section('content')
    <h1 > GG pour ton poste</h1>
   <p>
       Voici les informations de l'article publié : </br></br>

        titre : {{ $post->titre }}</br>
       description : {{ $post->description }}

   </p>
@stop