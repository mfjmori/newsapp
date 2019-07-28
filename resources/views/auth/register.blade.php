@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}" class="form-signin">
    @csrf
    <h2 class="text-center mb-3 mt-5">Please Sign Up</h2>

    <div class="field form-label-group mb-3 mt-5">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

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

    <div class="field form-label-group mb-4">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password comfirmation" required autocomplete="new-password">
    </div>

    <div class="actions">
        <button type="submit" class="btn btn-lg btn-primary btn-block">
            {{ __('Register') }}
        </button>
    </div>
</form>

@endsection
