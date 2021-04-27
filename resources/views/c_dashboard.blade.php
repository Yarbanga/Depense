@extends('layouts.master')
@section('content')
    <h1>Graphe des dépenses</h1>

    <div style="width: 50%; margin-left:15%;">
        {!! $depenseChart->container() !!}
    </div>
@endsection
@section('script')
    @if($depenseChart)
    {!! $depenseChart->script() !!}
    @endif
@endsection