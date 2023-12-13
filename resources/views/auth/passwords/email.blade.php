@extends('layouts.app')

@section('content')
<div class="reset">
    <div class="reset__left">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login__left__header fw-bold mb-5"> 
                    <h1>Forget Your Password?</h1>
                    <p>Enter email to restart your password</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
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
    
                    <div class="mb-0 reset__btn">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button> 
                        </div>
                        <div class="">
                            <a href="/login" class="btn btn-primary">
                                {{ __('Login') }}
                            </a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="reset__right">
        <div>
            {{-- <img src="{{ asset('img/resource/crm_1.svg') }}" alt=""> --}}
            {{-- <img src="{{ asset('img/resource/crm_2.svg') }}" alt=""> --}}
            <img src="{{ asset('img/resource/crm_3.svg') }}" alt="">
        </div>
    </div>

</div>
@endsection
