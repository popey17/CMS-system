@extends('layouts.app')

@section('content')
{{-- {{$users}} --}}
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Users</h3>
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
            <div>
                <input type="text" class="search__input">
                <button class="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="content__body">
            <div class="content__body__item">
                <button class="right__bar-toggle">right bar</button>
                @foreach ($users as $user){
                    <h2>{{ $user }}</h2>
                }
                    
                @endforeach
            </div>
            {{  $users->links() }}
        </div>  
        <div class="side__bar__right">
            <button class="right__menu-close"><i class="fa-solid fa-arrow-right"></i></button>
        </div>     
    </div>
    

</div>
@endsection

@section('script')
    @vite(['resources/js/user.js'])
@endsection