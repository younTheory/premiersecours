@extends("default")
@section('content')
    <div class="bg-danger">
        Vous avez fait un total de {{ $points }} points
    </div>
    <a class="btn btn-success" href="{{ route('scenarios') }}">Retour scénarios</a>

@endsection