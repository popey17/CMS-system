<div class="img__container">
    <img src="{{asset('img/profile/'. ($user->profile_pic ? $user->profile_pic : 'dummy.jpg'))}}" alt="" class="right__content__img">
</div>
<div class="user_info_container">
    <div class="user_info"> 
        <p class="name">{{$user->name}}</p>
        <p class="email"><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
        <p class="role">{{$user->role->name}}</p>
        <div class="store">
            @foreach ($user->stores as $store)
                <span >{{$store->name}}</span>
            @endforeach
        </div>
        {{-- <p class="store">{{$user->store->name}}</p> --}}

    </div>
    <div class="note">
        <p class="about_title">About me</p>
        <div>
            {!! $user->note ? $user->note : '<span class="no_info">no info for this user!</span>' !!}
        </div>
    </div>
</div>