
@foreach ($customers as $customer)
    <div class="list__item__container">
        <div class='list__item'>
            <p>{{ $customer->customer_id}}</p>
        </div>
        <div class='list__item'>           
                <p>{{ $customer->name}}</p>
        </div>
        <div class='list__item'>
            <p>{{ $customer->store->name}}</p>
        </div>
        <div class='list__item'>
            <p>{{ \Carbon\Carbon::parse($customer->created_date)->format('d M Y') }}</p>    
        </div>
        <div class='list__item'>
            <a class="btn" href="/customer/{{$customer->id}}/detail">detail</a>
            <button class="dropdown_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">...</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                <button class="dropdown-item customer-restore" data-toggle="modal" data-name="{{ $customer->name}}" data-id="{{$customer->id}}" data-target="#restoreCustomerBox">Restore</button>
                <button class="dropdown-item customer-restore" data-toggle="modal" data-name="{{ $customer->name}}" data-id="{{$customer->id}}" data-target="#purgeCustomerBox">Delete</button>
                {{-- <a class="dropdown-item customer-delete" href="/customer/{{$customer->id}}/delete">Delete</a> --}}
                
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="restoreCustomerBox" tabindex="-1" role="dialog" aria-labelledby="deleteUserBoxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="modelClose" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <div class="alert-icon"><i class="fa-solid fa-exclamation"></i></div>
                <p class="alert-title">Are you sure?</p>
                <p class="alert-body">Do you really want to restore the customer <span class="delete-customer"></span>?</p>
                <div class="footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="#" type="button" class="btn btn-primary customer_restore">Restore</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="purgeCustomerBox" tabindex="-1" role="dialog" aria-labelledby="deleteUserBoxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="modelClose" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <div class="alert-icon"><i class="fa-solid fa-exclamation"></i></div>
                <p class="alert-title">Are you sure?</p>
                <p class="alert-body">Do you really want to delete the customer <span class="delete-customer"></span>? This is permenent action.</p>
                <div class="footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="#" type="button" class="btn btn-danger customer_purge">Delete</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="pagination__warpper" data-url="customer">
    {!!  $customers->links('vendor.pagination.custompager') !!}
</div>