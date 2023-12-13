@extends('layouts.app')

@section('content')
<div class="login">
    <div class="login__left">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login__left__header fw-bold mb-5"> 
                    <h1>Welcome to CRM</h1>
                    <p>Sign in to your account to continue.</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
    
                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
    
                        <div class="password__container">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <i class="fa-solid fa-eye password__toggle hide"></i>
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <div class="check_btn">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
    
                    <div class="mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-primary login_btn">
                                {{ __('Login') }}
                            </button>
    
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="login__right">
        <div>
            {{-- <img src="{{ asset('img/resource/crm_1.svg') }}" alt=""> --}}
            <img src="{{ asset('img/resource/crm_2.svg') }}" alt="">
            {{-- <img src="{{ asset('img/resource/crm_3.svg') }}" alt=""> --}}
        </div>
    </div>

</div>
@endsection