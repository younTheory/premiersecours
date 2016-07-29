@extends("default")
@section('content')
    <h2> Statistiques de {{ $nom }} </h2>
    <p>Points : {{ $scoreObtenu }} / {{ $scoreMax }}</p>
    {{-- on doit insérer les donnuts manuellement pas possible de donner les variables --}}
    {{-- total--}}
    <div id="ca_total"></div>
    @donutchart('total', 'ca_total')
    {{-- scénario 1--}}
    <div id="scenario1"></div>
    @donutchart('Scenario1', 'scenario1')
    {{--scénario 2--}}
    <div id="scenario2"></div>
    @donutchart('Scenario2', 'scenario2')







@endsection