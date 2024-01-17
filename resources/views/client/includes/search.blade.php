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
