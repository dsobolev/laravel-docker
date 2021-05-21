@extends ('layout')

@section ('content')
    <ul>
        @foreach ($tweets as $tweet)
            <li>
                <p>{{ $tweet->text }} - <i>{{ $tweet->author }}</i></p>
                <span>{{ $tweet->created_at }}</span>
            </li>
        @endforeach
    </ul>
@endsection