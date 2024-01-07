@extends('layouts.app')
@section('content')
{{-- {{$customer}} --}}
@if(session('success'))
    <div class="notification notification-popup" role="alert">
        <strong>Success!</strong> {!!session('success')!!}
    </div>
@endif
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Customers</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li class="active"><a href="/customer">Customers</a></li>
                <li><a href="/customer/create">Add New Customer</a></li>
                <li><a href="/customer/bin">Recover Customer</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }} {{ session('rightSidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="content__body">
            <div class="content__body__item">
                <div class="customer__info">
                    <div class="mb-3">
                        <h2>{{$customer->name}}</h2>
                        <p><span style="color: #90a9dd;">ID</span> : {{$customer->customer_id}}</p>   
                    </div>
                    <div style="display: flex; gap: 100px">
                        <div>
                            <p class="info__label">Date</p>
                            <p>{{ \Carbon\Carbon::parse($customer->created_date)->format('d M Y') }}</p>
                            @if ($customer->birthday)
                                <p class="info__label">Brithday</p>
                                <p>{{ \Carbon\Carbon::parse($customer->birthday)->format('d M Y') }}</p>
                            @endif
                            <p class="info__label">Phone</p>
                            <p>{{$customer->phone}}</p>
                            @if ($customer->email)
                                <p class="info__label">Email</p>
                                <p>{{$customer->email}}</p>
                            @endif
                        </div>
                        <div>
                            <p class="info__label">Store</p>
                            <p>{{$customer->store->name}}</p>
                            <p class="info__label">Age</p>
                            <p>{{$customer->age}}</p>
                            @if ($customer->gurdian_phone)
                                <p class="info__label">Gurdian Phone</p>
                                <p>{{$customer->gurdian_phone}}</p>
                                
                            @endif
                            <p class="info__label">Address</p>
                            <p>{{$customer->address}}</p>
                        </div>
                    </div>
                </div> <hr>
                @foreach($customer->serviceRecord as $serviceRecord)
                    {{ $serviceRecord->service->name }}x
                @endforeach
                @foreach($customer->sale as $sale)
                    {{-- {{$sale}} --}}
                    @foreach($sale->products as $product)
                        {{ $product->name }}{{$product->pivot->quantity}}
                    @endforeach
                @endforeach
            </div>
        </div>      
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/customer.js'])
@endsection