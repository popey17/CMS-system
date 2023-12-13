@extends('layouts.app')

@section('content')
{{-- {{$users}} --}}
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        customer menu
    </div>
    <div class="main__content__item {{ session('sidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="content__body">
            <div class="content__body__item">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima cupiditate reiciendis necessitatibus ipsum eum maxime quis molestiae iure, a assumenda velit ex fugiat facilis id numquam explicabo. Quas, eius quasi.

            </div>
        </div>
        
        <div class="side__bar__right">

        </div>   
    </div>
    

</div>
@endsection