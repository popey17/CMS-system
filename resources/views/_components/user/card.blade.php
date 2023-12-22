<div class="card__container">
    @foreach ($users as $user)
        <div class="card__item">
            <div class="top detail__btn" data-id='{{$user->id}}'>
                <div class="card__img">
                    <img src="{{asset('img/profile/'.($user->profile_pic ? $user->profile_pic : 'dummy.jpg'))}}" alt="">
                </div>
                <div class="card__body">
                    <p class="card__body__title">{{$user->name}}</p>
                    <p class="card__body__role">{{$user->role->name}}</p>
                    <div class="card__body__store">
                        @foreach ($user->stores as $store)
                            <span >{{$store->name}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bot">
                <div class="card__btn">
                    <a class="edit" href="{{route('edit',['id' => $user->id])}}"><i class="fa-solid fa-pencil"></i>Edit</a>
                    <button class="delete" data-toggle="modal" data-name="{{ $user->name}}" data-id="{{$user->id}}" data-target="#deleteUserBox"><i class="fa-solid fa-trash"></i>Delete</button>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="modal fade" id="deleteUserBox" tabindex="-1" role="dialog" aria-labelledby="deleteUserBoxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="modelClose" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <div class="alert-icon"><i class="fa-solid fa-exclamation"></i></div>
                <p class="alert-title">Are you sure?</p>
                <p class="alert-body">Do you really want to delete the user <span class="delete-user"></span>? This action cannot be undone.</p>
                <div class="footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="#" type="button" class="btn btn-danger user_del">Delete</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="pagination__warpper" data-url='user'>
    {!!  $users->links('vendor.pagination.custompager') !!}
</div>
