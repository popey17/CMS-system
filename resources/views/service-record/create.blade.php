@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="notification notification-popup" role="alert">
        <strong>Success!</strong> {!!session('success')!!}
    </div>
@endif
<div class="main__content__container">
    <div class="side__menu {{ session('sidebarState') }}">
        <div class="side__menu__header">
            <h3>Services</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li><a href="/service-record">Services</a></li>
                <li class="active"><a href="/service-record/create">New Services</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }} {{ session('rightSidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
            <div>
                <input type="text" class="sale__search__input search__input">
                <button class="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="content__body">
            <div class="content__body__item">
                <div class="card__container__wrapper">
                  <form action="" enctype="multipart/form-data">
                    @csrf
                    <input type="file" multiple name="file" class="filepong" credits='fales'/>
                  </form>
                </div>
            </div>          
        </div>    
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/sale.js'])

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>


    <script>
      FilePond.registerPlugin(
      FilePondPluginImagePreview,
      );
        const inputElement = document.querySelector('input[type="file"]');

        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
          server: {
              process: '/temp-upload',
              revert: '/temp-delete',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
          },
      });

    </script>
@endsection