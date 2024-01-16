@extends('client.layout.clientlayout')
@section('content')
    <div class="search-section">
        <form action="{{ route('search.video') }}">
            @csrf
            @if (session('message'))
                <span>{{ session('message') }}</span><br>
            @endif
            @if ($errors->has('search'))
                <span>{{ $errors->first('search') }}</span><br>
            @endif
            <input type="text" name="search" placeholder="Search...">
            <button>Search</button>
        </form>
    </div>
    <div class="video-section">
        @foreach ($data as $data)
            <h3>{{ $data->title }}</h3>
            <p>{{ $data->description }}</p>
            <img src="{{ asset('images/tumbnails/' . $data->tumbnail) }}" alt="image" width="500px" height="250px">
        @endforeach
    </div>
@stop
