@extends('client.layout.clientlayout')
@section('content')
    <div class="video-section">
        
        @foreach ($data as $data)
            <h3>{{ $data->title }}</h3>
            <p>{{ $data->description }}</p>
            <img src="{{ asset('images/tumbnails/' . $data->tumbnail) }}" alt="image" width="500px" height="250px">
        @endforeach
    </div>
@stop
