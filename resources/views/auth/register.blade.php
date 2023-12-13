@extends('layouts.app')
@isset($data)
    {{ $data }}
@endisset
@section('content')
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Register User</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li ><a href="/user">Users</a></li>
                <li class="active"><a href="/user/register">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="content__body">
            <div class="register__container">
                <div class="">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="preview__img__container">
                                    <label for="profile_image">
                                        <img id="preview_image" src="{{asset('img/profile/dummy.jpg')}}" alt="" class="profile__img" width="200px">
                                        <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image"  style="display: none">
                                    </label>
                                    <div class="remove__img"><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div class=" mb-3">
                                    <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
        
                                    <div class="">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class=" mb-3">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
        
                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class=" mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="password__container">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i class="fa-solid fa-eye password__toggle hide"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="password__container">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="store-id" class="col-md-4 col-form-label">{{ __('Store ID') }}</label>
                                <div class="select">
                                    <select id="store-id" class="form-control" name="store_id" required>
                                        <option value="">Select Role</option>
                                        <option value="1">Store 1</option>
                                        <option value="2">Store 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="role-id" class="col-md-4 col-form-label">{{ __('Role ID') }}</label>
                                <div class="select">
                                    <select id="role-id" class="form-control" name="role_id" required>
                                        <option value="">Select Store</option>
                                        <option value="1">Store 1</option>
                                        <option value="2">Store 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="note" class="col-md-4 col-form-label">{{ __('Note') }}</label>

                            <div class="">
                                <textarea name="note" id="mytextarea"></textarea>
                            </div>
                        </div>

                        <div class=" mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>
    

</div>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
@endsection




