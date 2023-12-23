@extends('layouts.app')
@section('content')
{{-- {{Auth::user()->stores}} --}}
{{-- {{$customerId}}  --}}
@if(session('success'))
    <div class="notification notification-popup" role="alert">
        <strong>Success!</strong> {!!session('success')!!}
    </div>
@endif
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Add Customer</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li><a href="/customer">Customers</a></li>
                <li class="active"><a href="/customer/create">Add New Customer</a></li>
                <li><a href="/customer/bin">Recover Customer</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }} {{ session('rightSidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
            {{-- <div>
                <input type="text" class="customer__search__input search__input">
                <button class="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div> --}}
        </div>
        <div class="content__body">
            <div class="content__body__item">
                <div class="register__container">

                    <div class="">
                        <form method="POST" action="{{ route('customer.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="customer_id" class="col-md-4 col-form-label">{{ __('ID') }}</label>
        
                                    <div class="">
                                        <input id="customer_id" type="tel" class="form-control @error('email') is-invalid @enderror" name="customer_id" value="PT-{{$customerId}}">
                                    </div>
                                    @error('customer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="created_date" class="col-md-4 col-form-label">{{ __('Date') }}</label>
            
                                        <div class="">
                                            <input id="created_date" type="date" class="form-control @error('created_date') is-invalid @enderror" name="created_date" value="{{ date('Y-m-d') }}">
                                        </div>
                                        @error('created_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

        
                            </div>

                            <div class="mb-3">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="store_id" class="col-md-4 col-form-label">{{ __('store')}}</label>
                                <div class="">
                                    <select name="store_id" id="store_id" class="form-control @error('store_id') is-invalid @enderror">
                                        <option value="">Select Store</option>
                                        @foreach (Auth::user()->stores as $store)
                                            <option value="{{$store->id}}">{{$store->name}}</option>
                                        @endforeach
                                    </select>
    
                                    @error('store_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>
    
                                <div class="">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="birthday" class="col-md-4 col-form-label">{{ __('Birthday') }}</label>
        
                                    <div class="">
                                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday">
                                    </div>
                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="col-md-4 col-form-label">{{ __('Phone') }}</label>
        
                                    <div class="">
                                        <input id="phone" type="tel" class="form-control @error('email') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="col-md-6">
                                    <label for="gurdian_phone" class="col-md-4 col-form-label">{{ __('Gurdian Phone') }}</label>
        
                                    <div class="">
                                        <input id="gurdian_phone" type="tel" class="form-control @error('gurdian_phone') is-invalid @enderror" name="gurdian_phone" value="{{ old('gurdian_phone') }}">
                                    </div>
                                    @error('gurdian_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <div class="">
                                    <label for="address" class="col-md-4 col-form-label">{{ __('Address') }}</label>
        
                                    <div class="">
                                        <textarea id="address" type="tel" class="form-control @error('address') is-invalid @enderror" name="address">{{old('address')}}</textarea>
                                    </div>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
</div>
{{-- <script>
    tinymce.init({
        selector: '#mytextarea'
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script> --}}
@endsection


@section('script')
    @vite(['resources/js/customer.js'])
@endsection