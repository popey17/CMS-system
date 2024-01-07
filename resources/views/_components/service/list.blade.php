@foreach ($serviceRecords as $serviceRecord)
    <div class="list__item__container">
        {{-- <a href=""> --}}
            <div class='list__item'>
                <p>{{ $serviceRecord->service_record_id}}</p>
            </div>
            <div class='list__item'>           
                    <p>{{ $serviceRecord->customer->name}}</p>
            </div>
            <div class='list__item'>
                <p>{{ $serviceRecord->customer->store->name}}</p>
            </div>
            <div class='list__item'>
                <p>{{ \Carbon\Carbon::parse($serviceRecord->date)->format('d M Y') }}</p>    
            </div>
            <div class='list__item'>
                <a class="btn" href="/sale/{{$serviceRecord->id}}/detail">detail</a>
                <button class="dropdown_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">...</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    {{-- <a class="dropdown-item sale-delete" href="/sale/{{$sale->id}}/delete">Delete</a> --}}
                    <button class="dropdown-item sale-delete" data-toggle="modal" data-name="{{ $serviceRecord->customer->name}}" data-id="{{$serviceRecord->id}}" data-target="#deleteSaleBox">Delete</button>
                    
                </div>
            </div>
        </a>
    </div>
@endforeach

<div class="modal fade" id="deleteSaleBox" tabindex="-1" role="dialog" aria-labelledby="deleteUserBoxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="modelClose" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <div class="alert-icon"><i class="fa-solid fa-exclamation"></i></div>
                <p class="alert-title">Are you sure?</p>
                <p class="alert-body">Do you really want to delete the sale for customer <span class="delete-sale"></span>?</p>
                <div class="footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="#" type="button" class="btn btn-danger sale_del">Delete</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="pagination__warpper" data-url="sale">
    {{-- {!!  $serviceRecord->links('vendor.pagination.custompager') !!} --}}
</div>