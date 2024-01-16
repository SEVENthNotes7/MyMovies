@extends('client.layout.clientlayout')
@section('content')
    <div class="search-section">
        <form action="#">
            <input type="text" name="title" placeholder="Search...">
            <button>Search</button>
        </form>
    </div>
    <div class="video-section">
        @foreach ($data as $data)
            <p>{{ $data }}</p>
        @endforeach
    </div>
@stop
