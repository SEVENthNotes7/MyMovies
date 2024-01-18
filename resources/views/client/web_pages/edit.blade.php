@extends('client.layout.clientlayout')
@section('content')
    <form action="{{ route('update.user.video', ['id' => encrypt($data->id)]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (session('message'))
            <span>{{ session('message') }}</span>
        @endif
        @if ($errors->has('title'))
            <span>{{ $errors->first('title') }}</span><br>
        @endif
        @if ($errors->has('description'))
            <span>{{ $errors->first('description') }}</span><br>
        @endif
        <label for="videoid">videoID: </label><span>{{ $data->id }}</span><br>
        <label for="authorsID">Creator ID: </label><span>{{ $data->Authors_id }}</span><br>
        <label for="title">title:</label>
        <input type="text" name="title" value="{{ $data->title }}"><br>
        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $data->description }}"><br>
        <label for="tumbnail">tumbnail:</label>
        <input type="file" name="tumbnail"><br>
        <img src="{{ asset('images/tumbnails/' . $data->tumbnail) }}" alt="image" width="300px" height="250px"><br>
        <label for="video">video</label>
        <input type="file" name="video"><br>
        <video width="500px" height="250pv" controls>
            <source src="{{ asset('images/videos/' . $data->video) }}">
        </video><br>
        <button>Update</button>
    </form>
@stop
