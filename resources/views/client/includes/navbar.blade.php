<header>
    <nav>
        <a href="{{ route('Home') }}">Home</a>
        <a href="{{ route('view.myvideos', ['id' => encrypt(auth()->user()->id)]) }}">MyVideos</a>
        <a href="{{ route('view.profile', ['id' => encrypt(auth()->user()->id)]) }}">Profile</a>
    </nav>
</header>
