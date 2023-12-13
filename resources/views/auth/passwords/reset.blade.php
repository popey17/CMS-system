@extends('layouts.app')

@section('content')
<div class="reset">
    <div class="reset__left">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login__left__header fw-bold mb-5"> 
                    <h1>Change Your Password?</h1>
                    <p>Enter new password to continue.</p>
                </div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
    
                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    
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
                        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                        <div class="password__container">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            {{-- <i class="fa-solid fa-eye password__toggle hide"></i> --}}
                        </div>
                    </div>
    
                    <div class="mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-primary login_btn">
                                {{ __('Restart Password') }}
                            </button>
    
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="reset__right">
        <div>
            <img src="{{ asset('img/resource/crm_5.svg') }}" alt="">
        </div>
    </div>

</div>

@endsection
