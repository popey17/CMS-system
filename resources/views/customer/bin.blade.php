@extends('layouts.app')
@section('content')
{{-- {{$customers}} --}}
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
                <li><a href="/customer">Customers</a></li>
                <li><a href="/customer/add">Add New Customer</a></li>
                <li class="active"><a href="/customer/bin">Recover Customer</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }} {{ session('rightSidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
            <div>
                <input type="text" class="search__input deleted__search__input">
                <button class="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="content__body">
            <div class="content__body__item">
                <div class="sort__control customer">
                    <div class="sort__icon__wrapper">
                        <span data-sort='customer_id'>Id</span>
                        <div class="sort__icon">
                            <button class="deleted_customer_sort_btn" data-order="ASC"><i class="fa-solid fa-sort-up"></i></button>
                            <button class="deleted_customer_sort_btn" data-order="DESC"><i class="fa-solid fa-sort-down"></i></button>
                        </div>
                    </div>
                    <div class="sort__icon__wrapper">
                        <span data-sort='name'>Name</span>
                        <div class="sort__icon">
                            <button class="deleted_customer_sort_btn" data-order="ASC"><i class="fa-solid fa-sort-up"></i></button>
                            <button class="deleted_customer_sort_btn" data-order="DESC"><i class="fa-solid fa-sort-down"></i></button>
                        </div>
                    </div>
                    <div class="sort__icon__wrapper">
                        <span data-sort='store_id'>Store</span>
                        <div class="sort__icon">
                            <button class="deleted_customer_sort_btn" data-order="ASC"><i class="fa-solid fa-sort-up"></i></button>
                            <button class="deleted_customer_sort_btn" data-order="DESC"><i class="fa-solid fa-sort-down"></i></button>
                        </div>
                    </div>
                    <div class="sort__icon__wrapper">
                        <span data-sort='created_date'>Date</span>
                        <div class="sort__icon">
                            <button class="deleted_customer_sort_btn" data-order="ASC"><i class="fa-solid fa-sort-up"></i></button>
                            <button class="deleted_customer_sort_btn" data-order="DESC"><i class="fa-solid fa-sort-down"></i></button>
                        </div>
                    </div>
                    <div class="sort__icon__wrapper">

                    </div>
                </div>
                <div class="card__container__wrapper">
                    @include('_components.customer.deleted')
                </div>
            </div>           
        </div>  
        <div class="side__bar__right {{ session('rightSidebarState') }}">
            <div class="top">
                <button class="right__menu-close"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="right__content">
                {{-- @include('_components.customer.list') --}}
            </div>
        </div>     
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/customer.js'])
@endsection