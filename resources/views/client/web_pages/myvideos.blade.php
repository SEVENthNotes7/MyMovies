@extends('client.layout.clientlayout')
@section('content')
    <div class="uploade-user-video">
        <form action="{{ route('user.uploader.video', ['id' => encrypt(auth()->user()->id)]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="messages">
                @if (session('message'))
                    <span>{{ session('message') }}</span>
                @endif
                @if ($errors->has('title'))
                    <span>{{ $errors->first('title') }}</span>
                @endif
                @if ($errors->has('description'))
                    <span>{{ $errors->first('description') }}</span>
                @endif
                @if ($errors->has('tumbnail'))
                    <span>{{ $errors->first('tumbnail') }}</span>
                @endif
                @if ($errors->has('video'))
                    <span>{{ $errors->first('video') }}</span>
                @endif
            </div>
            <label>title</label><input type="text" name="title">
            <label>description</label><input type="text" name="description">
            <label>Tumbnail</label><input type="file" name="tumbnail">
            <label>Video</label><input type="file" name="video">
            <button type="submit">upload</button>
        </form>
    </div>
    <div class="user-video-section">
        @foreach ($data as $data)
            <div class="user-video">
                <h3>{{ $data->title }}</h3>
                <p>{{ $data->description }}</p>
                <img src="{{ asset('images/tumbnails/' . $data->tumbnail) }}" alt="image" width="150px" height="150px">
                <a href="#"><button>play</button></a>
            </div>
        @endforeach
    </div>

@stop
