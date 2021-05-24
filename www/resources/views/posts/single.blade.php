@extends ('layout')

@section ('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <div>
        <ul>
        @foreach ($post->tags as $tag)
            <li><a href="{{ route('posts.index', [ 'tag' => $tag->name ]) }}">{{ $tag->name }}</a></li>
        @endforeach
        </ul>
    </div>
@endsection