<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
    

    <!-- Css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Scripts -->
    <script src="https://cdn.tiny.cloud/1/7k7dmd0e3ms0ha0ykfrbbot2tu2cfaor1ovmm5av3hms7xk7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @auth
        <nav class="navBar">
            
            <a href="{{ url('/customer')}}" class="logo">
                @php
                    $company = DB::table('companies')->first();
                @endphp
                @if($company)
                    <img src="{{ asset('img/company/' . ($company->logo ? $company->logo : 'default.jpg')) }}" alt="logo">
                @else
                    <img src="{{ asset('img/company/default.jpg') }}" alt="logo">
                @endif
            </a>
            <div class="nav-links">
                <div class="top">
                    <ul>
                        <li>
                            <div data-title="Admin Dashboard">
                                <a href="{{ url('/dashboard')}}" class="nav-item"><i class="fa-solid fa-chart-line"></i></a>
                            </div>
                        </li>
                        <li>
                            <div data-title="Customer">
                                <a href="{{ url('/customer')}}" class="nav-item"><i class="fa-solid fa-user-tag"></i></a>
                            </div>
                        </li>
                        <li>
                            <div data-title="Stores">
                                <a href="{{ url('/store')}}" class="nav-item"><i class="fa-solid fa-store"></i></a>
                            </div>
                        </li>
                        <li>
                            <div data-title="Users">
                                <a href="{{ url('/user')}}" class="nav-item"><i class="fa-solid fa-user"></i></a>
                            </div>
                        </li>
                        <li>
                            <div data-title="Sales">
                                <a href="{{ url('/sale')}}" class="nav-item"><i class="fa-solid fa-receipt"></i></a>
                            </div>
                        </li>
                        <li>
                            <div data-title="Services">
                                <a href="{{ url('/service-record')}}" class="nav-item"><i class="fa-solid fa-notes-medical"></i></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="bot">
                    @auth
                    <div class="dropdown">
                        <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{asset('img/profile/'.  (auth()->user()->profile_pic ? auth()->user()->profile_pic : 'dummy.jpg'))}}" alt="" class="profile__img">
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu--end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a  class="dropdown-item" href="#">
                                {{ Auth::user()->name }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
        </nav>
        @endauth
        
        <main class="main">
            @yield('content')
        </main>
        @yield('script')
    </div>
</body>
</html>
