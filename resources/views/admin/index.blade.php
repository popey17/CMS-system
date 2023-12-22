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
        <div class="content__body company">
            <div class="company__item info-container">
                <div class="info">
                    <img src="{{'img/company/'.$company->logo}}" alt="">
                    <div>
                        <h3>{{$company->name}}</h3>
                        <p>{{$company->phone}}</p>
                        <p>{{$company->email}}</p>
                        <p>{{$company->address}}</p>
                        <p>{{$company->website}}</p>
                    </div>
                    <a href="{{route('company.edit',['id' => $company->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    
                </div>
                
            </div>
            <div class="company__item sale">
                sale
            </div>
            <div class="company__item customer">
                customer
            </div>
        </div> 
        <div class="content__body main">
        </div>     
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/user.js'])
@endsection