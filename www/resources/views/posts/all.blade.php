@extends ('layout')

@section ('content')
    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @empty
            <li>No related posts</li>
        @endforelse
    </ul>
@endsection

@section ('links')
    <a href="/posts/create" class="ml-1">
        Create New
    </a>
@endsection