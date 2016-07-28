@extends("default")
@section('content')
    {{-- on doit insérer les donnuts manuellement pas possible de donner les variables --}}
    {{-- scénario 1--}}
    <div id="scenario1"></div>
    @columnchart('Scenario1', 'scenario1')
    {{--scénario 2--}}
    <div id="scenario2"></div>
    @columnchart('Scenario2', 'scenario2')
    {{-- scénario 3--}}
    <div id="scenario3"></div>
    @columnchart('Scenario3', 'scenario3')
    {{-- scénario 4--}}
    <div id="scenario4"></div>
    @columnchart('Scenario4', 'scenario4')







@endsection