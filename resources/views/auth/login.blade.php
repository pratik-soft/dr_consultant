@extends('layouts.backend')

@section('bodyClass', 'hold-transition login-page pace-primary')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ __($settings['site_name']) }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Login to start your session') }}</p>

            @include('partials.backend.flash-message')

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="input-group mb-3">                    
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">                    
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="icheck-primary">                            
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            </p>
            @endif

            @if (Route::has('register'))
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ __('Register a new account') }}</a>
            </p>
            @endif            
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection

@section('scripts')
<script src="{{ asset('js/backend/auth/login.js') }}"></script>
@endsection
