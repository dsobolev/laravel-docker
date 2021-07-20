@extends ('layout')

@section ('content')
    <ul>
        @forelse ($posts as $post)
            <li class="flex justify-between">
                <div>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    <span>({{ $post->author->name }})</span>
                </div>
                <div class="flex justify-center">
                    @can('update', $post)
                        <a class="btn" href="{{ route('posts.edit', $post) }}">Edit</a>
                    @endcan

                    @can('delete', $post)
                        <form action="{{ route('posts.delete', $post) }}" method="post">
                            <input class="btn" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    @endcan
                </div>
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