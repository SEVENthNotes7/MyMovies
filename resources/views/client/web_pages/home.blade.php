@extends('client.layout.clientlayout')
@section('content')
    <div class="video-section">

        @foreach ($data as $data)
            <h3>{{ $data->title }}</h3>
            <p>{{ $data->description }}</p>
            <img src="{{ asset('images/tumbnails/' . $data->tumbnail) }}" alt="image" width="500px" height="250px">
            <a href="{{ route('video.player', ['id' => encrypt($data->id)]) }}"><button>play</button></a>
        @endforeach
    </div>
@stop
