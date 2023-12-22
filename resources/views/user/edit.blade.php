@extends('layouts.app')
@section('content')
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Edit User</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li class="active"><a href="/user">Users</a></li>
                <li ><a href="/user/register">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="content__body register">
            <div class="register__container">

                <div class="">
                    <form method="POST" action="{{ route('update',['id'=>$user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3 align-items-end">
                            <div class="col-md-4">
                                <div class="preview__img__container">
                                    <label for="profile_image">
                                        <img id="preview_image" src="{{asset('img/profile/'.($user->profile_pic ? $user->profile_pic : 'dummy.jpg'))}}" alt="" class="profile__img" width="200px">
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
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $user->name }}" autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
        
                                    <div class="">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="store-id" class="col-md-4 col-form-label">{{ __('Store ID') }}</label>
                                <div class="select">
                                    <select class="js-example-basic-multiple" style="width: 100%" name="states[]" multiple="multiple">
                                        <?php $stores = App\Models\Store::all(); ?>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}" {{ in_array($store->id, $selectedStores) ? 'selected' : '' }}>
                                                {{ $store->name }}
                                            </option>                                       
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="role-id" class="col-md-4 col-form-label">{{ __('Role ID') }}</label>
                                <div class="select">
                                    <select id="role-id" class="form-control" name="role_id">
                                        <?php $roles = App\Models\Role::all(); ?>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"
                                            @if ($role->id == $user->role_id)
                                                selected
                                            @endif
                                                >{{$role->name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="note" class="col-md-4 col-form-label">{{ __('Note') }}</label>

                            <div class="">
                                <textarea name="note" id="mytextarea">{{ old('note') ? old('note') : $user->note }}</textarea>
                            </div>
                        </div>

                        <div class=" mb-0 d-flex gap-2">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                            <div class="">
                                <a href="{{route('users')}}" class="btn btn-secondary">
                                    {{ __('back') }}
                                </a>
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

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection




