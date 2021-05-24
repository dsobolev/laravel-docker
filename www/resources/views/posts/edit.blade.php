@extends ('layout')

@section ('content')
<h1>Edit Post - {{ $post->title }}</h1>
<form method="POST" action="/posts/{{ $post->id }}" name="create">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-1">
        <div class="p-6 flex items-center">
            <label class="text-lg" for="title">Title</label>
            <input type="text" class="ml-4" name="title" value="{{ $post->title }}">
        </div>
        <div class="p-6 flex items-center">
            <label class="text-lg" for="content">Content</label>
            <textarea class="ml-4" name="content">{{ $post->content }}</textarea>
        </div>
        <div class="p-6 flex justify-center">
            <button type="submit" class="border-gray-200 text-lg leading-7">Save</button>
        </div>
    </div>
</form>
@endsection