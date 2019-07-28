@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" class="form-signin">
    @csrf
    <h2 class="text-center mb-3 mt-5">Please Login</h2>

    <div class="field form-label-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="field form-label-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="field text-center">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>

    <div class="actions">
        <button type="submit" class="btn btn-lg btn-primary btn-block mt-3">
            {{ __('Login') }}
        </button>
    </div>

</form>
@endsection
