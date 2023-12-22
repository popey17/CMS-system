@extends('layouts.app')

@section('content')
<div class="company__register">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="login__left">
        <div class="justify-content-center register_content">
            <div class="welcome">
                <h1>Welcome to CRM!!</h1>
                <p>Hi, Thanks for choosing CRM. Lets start with setting up the company.</p>
                <button class="btn btn-primary next_btn">next</button>
            </div>
        </div>
        <div class="row justify-content-center register_content hide">
            <div class="company">
                <h2 class="mb-5">Company Register</h2>
                <form method="POST" action="{{route('company.register')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="col-md-4">
                            <div class="preview__img__container">
                                <label for="logo">
                                    <img id="preview_image" src="{{asset('img/profile/dummy.jpg')}}" alt="" class="profile__img" width="200px">
                                    <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"  style="display: none">
                                </label>
                                <div class="remove__img"><i class="fa-solid fa-xmark"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%;">
                        <div class="col-md-6" style="padding: 0 0 10px 0">
                            <label for="name" class="col-form-label">{{ __('Comapny Name') }}</label>
    
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0 0 0 10px">
                            <label for="email" class="col-form-label">{{ __('Company Email Address') }}</label>
    
                            <div class="">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="address" class="col-md-4 col-form-label">{{ __('Address') }}</label>
    
                        <div class="password__container">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="col-md-4 col-form-label">{{ __('Phone') }}</label>
    
                        <div class="password__container">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="website" class="col-md-4 col-form-label">{{ __('Company Website') }}</label>
    
                        <div class="password__container">
                            <input id="website" type="tel" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-0">
                        <div class="mt-5">
                            <span class="btn btn-secondary prev_btn login_btn">Prev</span>

                            <button type="submit" class="btn btn-primary login_btn">
                                {{ __('Register') }}
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
            <img src="{{ asset('img/resource/company.svg') }}" alt="">
            {{-- <img src="{{ asset('img/resource/crm_3.svg') }}" alt=""> --}}
        </div>
    </div>

</div>
@endsection