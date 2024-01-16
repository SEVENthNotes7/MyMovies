@extends('client.layout.clientlayout')
@section('content')
    <video width="500px" height="250pv" controls>
        <source src="{{ asset('images/videos/' . $video->video) }}">
    </video>
@stop
