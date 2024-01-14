@extends('client.layout.clientlayout')
@section('content')
    <div class="uploade-user-video">
        <form action="{{ route('user.uploader.video', ['id' => encrypt(auth()->user()->id)]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <label>title</label><input type="text" name="title">
            <label>description</label><input type="text" name="description">
            <label>Tumbnail</label><input type="file" name="tumbnail">
            <label>Video</label><input type="file" name="video">
            <button type="submit">upload</button>
        </form>
    </div>
@stop
