@foreach ($sales as $sale)
    <div class="list__item__container">
        {{-- <a href=""> --}}
            <div class='list__item'>
                <p>{{ $sale->sale_id}}</p>
            </div>
            <div class='list__item'>           
                    <p>{{ $sale->customer->name}}</p>
            </div>
            <div class='list__item'>
                <p>{{ $sale->store->name}}</p>
            </div>
            <div class='list__item'>
                <p>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}</p>    
            </div>
            <div class='list__item'>
                <a class="btn" href="/sale/{{$sale->id}}/detail">detail</a>
                <button class="dropdown_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">...</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item sale-restore" data-toggle="modal" data-name="{{ $sale->name}}" data-id="{{$sale->id}}" data-target="#restoreSaleBox">Restore</button>
                    {{-- <a class="dropdown-item sale-delete" href="/sale/{{$sale->id}}/delete">Delete</a> --}}
                    <button class="dropdown-item sale-delete" data-toggle="modal" data-name="{{ $sale->customer->name}}" data-id="{{$sale->id}}" data-target="#purgeSaleBox">Delete</button>
                    
                </div>
            </div>
        </a>
    </div>
@endforeach

<div class="modal fade" id="restoreSaleBox" tabindex="-1" role="dialog" aria-labelledby="deleteUserBoxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="modelClose" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <div class="alert-icon"><i class="fa-solid fa-exclamation"></i></div>
                <p class="alert-title">Are you sure?</p>
                <p class="alert-body">Do you really want to restore the data for the customer <span class="delete-sale"></span>?</p>
                <div class="footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="#" type="button" class="btn btn-primary customer_restore">Restore</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="purgeSaleBox" tabindex="-1" role="dialog" aria-labelledby="deleteUserBoxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="modelClose" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <div class="alert-icon"><i class="fa-solid fa-exclamation"></i></div>
                <p class="alert-title">Are you sure?</p>
                <p class="alert-body">Do you really want to delete the sale for customer <span class="delete-sale"></span>? This is permenent action.</p>
                <div class="footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="#" type="button" class="btn btn-danger sale_purge">Delete</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="pagination__warpper" data-url="sale">
    {!!  $sales->links('vendor.pagination.custompager') !!}
</div>