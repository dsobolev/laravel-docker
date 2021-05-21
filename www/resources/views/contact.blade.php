@extends ('layout')

@section ('head')
<style type="text/css">
    .has-error {
        border: dotted 1px red;
    }
</style>
@endsection

@section ('content')
<h1>Contact Us</h1>
<form method="POST" action="/contact">

    @csrf

    <div class="">
        <div class="p-6 flex justify-center">
            
            <div>
                <label class="text-lg text-white" for="email">Email</label>
            </div>
            <div>
                <input 
                    type="text"
                    class="ml-4 px-4 py-1 bg-gray-200 focus:bg-white rounded-2xl border-2 border-green-200 focus:border-green-800  @error('email') has-error @enderror"
                    name="email"
                    value="{{ old('email') }}"
                >
            </div>

            @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

        </div>
        
        <div class="p-6 flex justify-center">
            <button type="submit" class="btn btn-green">Send</button>
        </div>

        @if ( session('message') )
        <div class="text-blue-500 text-sm m-4">{{ session('message') }}</div>
        @endif
    </div>
</form>
@endsection