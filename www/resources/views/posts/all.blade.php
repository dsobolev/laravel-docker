@extends ('layout')

@section ('content')
    <ul>
        @forelse ($posts as $post)
            <li class="flex justify-between">
                <div name="info">
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    <span>({{ $post->author->name }})</span>
                </div>
                <div name="buttons"></div>
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}">Edit</a>
                @endcan
            </li>
        @empty
            <li>No related posts</li>
        @endforelse
    </ul>
@endsection

@section ('links')
    @can ('create', App\Models\Post::class)
        <a href="/posts/create" class="ml-1">
            Create New
        </a>
    @endcan
@endsection