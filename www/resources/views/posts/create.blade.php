@extends ('layout')

@section ('head')
<style type="text/css">
    .error {
        color: red;
        font-style: italic;
    }
    .has-error {
        border: dotted 1px red;
    }
</style>
@endsection

@section ('content')
<h1>New Post</h1>
<form method="POST" action="/posts" name="create">

    @csrf

    <div class="grid grid-cols-1">
        <div class="p-6 flex items-center">
            <label class="text-lg" for="title">Title</label>
            <input 
                type="text"
                class="ml-4 @error('title') has-error @enderror"
                name="title"
                value="{{ old('title') }}"
            >

            @error('title')
                <p class="error">{{ $errors->first('title') }}</p>
            @enderror

        </div>
        <div class="p-6 flex items-center">
            <label class="text-lg" for="content">Content</label>
            <textarea
                class="ml-4 @error('content') has-error @enderror"
                name="content"
            >{{ old('content') }}
            </textarea>

            @error('content')
                <p class="error">{{ $errors->first('content') }}</p>
            @enderror

        </div>
        <div class="p-6 flex items-center">
            <label class="text-lg" for="content">Tags</label>
            <select
                class="ml-4 @error('tags') has-error @enderror"
                name="tags[]"
                multiple
            >
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

            @error('tags')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="p-6 flex justify-center">
            <button type="submit" class="border-gray-200 text-lg leading-7">Save</button>
        </div>
    </div>
</form>
@endsection