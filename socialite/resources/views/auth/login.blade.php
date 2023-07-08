@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="{{ route('provider.redirect', 'google') }}" class="btn btn-lg google">
                                    <span><i class="fa-brands fa-google"></i></span> <span>Login with Google</span>
                                </a>
                                <a href="{{ route('provider.redirect', 'github') }}" class="btn btn-lg github">
                                    <span><i class="fa-brands fa-github"></i></span> <span>Login with GitHub</span>
                                </a>
                                <a href="{{ route('provider.redirect', 'twitter') }}" class="btn btn-lg twitter">
                                    <span><i class="fa-brands fa-twitter"></i></span> <span>Login with Twitter</span>
                                </a>
                                <a href="{{ route('provider.redirect', 'linkedin') }}" class="btn btn-lg linkedin">
                                    <span><i class="fa-brands fa-linkedin"></i></span> <span>Login with LinkedIn</span>
                                </a>
                                <!-- <a href="{{ route('provider.redirect', 'facebook') }}" class="btn btn-lg facebook">
                                    <span><i class="fa-brands fa-facebook"></i></span> <span>Login with Facebook</span>
                                </a> -->
                                <!-- <a href="{{ route('provider.redirect', 'gitlab') }}" class="btn btn-lg gitlab">
                                    <span><i class="fa-brands fa-gitlab"></i></span> <span>Login with GitLab</span>
                                </a>
                                <a href="{{ route('provider.redirect', 'bitbucket') }}" class="btn btn-lg bitbucket">
                                    <span><i class="fa-brands fa-bitbucket"></i></span> <span>Login with BitBucket</span>
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection