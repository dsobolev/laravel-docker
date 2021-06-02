@extends('layout')

@section('content')
<div class="container text-gray-400">
    <div class="text-center mb-5">{{ __('Login') }}</div>

    <div class="">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-row">
                <div class="w-1/3">
                    <label for="email" class="font-bold">{{ __('E-Mail Address') }}</label>
                </div>

                <div class="w-2/3">
                    <input id="email" type="email" class="form-input @error('email') field-has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <p class="form-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="w-1/3">
                    <label for="password" class="font-bold">{{ __('Password') }}</label>
                </div>

                <div class="w-2/3">
                    <input id="password" type="password" class="form-input @error('password') field-has-error @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="form-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="w-1/3"></div>
                <div class="w-2/3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-sm" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                </div>
            </div>

            <div class="form-row justify-evenly">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
