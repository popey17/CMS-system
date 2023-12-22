@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="notification notification-popup" role="alert">
        <strong>Success!</strong> {{session('success')}}
    </div>
@endif
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Dashboards</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li class="active"><a href="/dashboard">Dashboard</a></li>
                <li ><a href="/products">Products</a></li>
                <li ><a href="/service">Services</a></li>
                <li ><a href="/store">Shops</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="content__body">
            <div class="register__container">
                <form method="POST" action="{{route('company.edit',['id'=>$company->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="col-md-4">
                            <div class="preview__img__container">
                                <label for="logo">
                                    <img id="preview_image" src="{{asset('img/company/'.($company->logo? $company->logo : 'default.jpg'))}}" alt="" class="profile__img" width="200px">
                                    <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"  style="display: none">
                                </label>
                                <div class="remove__img"><i class="fa-solid fa-xmark"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="margin:0;">
                        <div class="col-md-6" style="padding: 0 0 10px 0">
                            <label for="name" class="col-form-label">{{ __('Comapny Name') }}</label>
    
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $company->name}}">
        
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
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $company->email }}">
        
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
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ? old('address') : $company->address }}">
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
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ? old('phone') : $company->phone }}">
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
                            <input id="website" type="tel" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') ? old('website') : $company->website }}">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-0">
                        <div class="mt-5">
                            <a href="{{route('dashboard')}}" class="btn btn-secondary login_btn">{{ __('Back') }}</a>  
                            <button type="submit" class="btn btn-primary login_btn">
                                {{ __('Edit') }}
                            </button>  
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>     
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/user.js'])
@endsection