@extends('layouts.app')

@section('content')
<div class="error container">
    <div class=error__container>
        <div class="error__img__container">
            <img src="{{ asset('img/resource/404_2.svg') }}" alt="404">
        </div>
        <h2>Page not found</h2>
        <p>Sorry, the page you're looking for doesn't exist.</p>
        <a href="{{ route('customer') }}">Go back home</a>
    </div>
</div>
@endsection