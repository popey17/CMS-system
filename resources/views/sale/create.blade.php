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
            <h3>Sales</h3>
        </div>
        <div class="side__menu__links">
            <ul>
                <li><a href="/sale">Sale</a></li>
                <li class="active"><a href="/sale/create">New Sale</a></li>
                <li><a href="/sale/bin">Recover Customer</a></li>
            </ul>
        </div>
    </div>
    <div class="main__content__item {{ session('sidebarState') }} {{ session('rightSidebarState') }}">
        <div class="content__header">
            <button class="sub__menu-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="content__body">
            <div class="content__body__item">
                <div class="register__container">

                    <div class="">
                        <form method="POST" action="{{ route('sale.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="sale_id" class="col-md-4 col-form-label">{{ __('ID') }}</label>
        
                                    <div class="">
                                        <input id="sale_id" type="tel" class="form-control @error('email') is-invalid @enderror" name="sale_id" value="SI-{{$saleId}}">
                                    </div>
                                    @error('sale_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="sale_date" class="col-md-4 col-form-label">{{ __('Date') }}</label>
            
                                        <div class="">
                                            <input id="sale_date" type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{ date('Y-m-d') }}">
                                        </div>
                                        @error('sale_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="suer_id"  class="col-md-4 col-form-label">{{ __('Sale Person') }}</label>
                                    <div class="">
                                        <select class="js-user-single" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="width: 100%">
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}" {{ old('user_id', auth()->id()) == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="store_id" class="col-md-4 col-form-label">{{ __('Store')}}</label>
                                    <div class="">
                                        <select name="store_id" id="store_id" class="form-control @error('store_id') is-invalid @enderror">
                                            <option value="">Select Store</option>
                                            @foreach (Auth::user()->stores as $store)
                                                <option value="{{$store->id}}" {{ old('store_id') == $store->id ? 'selected' : '' }}>{{$store->name}}</option>
                                            @endforeach
                                        </select>
        
                                        @error('store_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="customer_id"  class="col-md-4 col-form-label">{{ __('Customer Name') }}</label>
                                <div class="">
                                    <select class="js-example-basic-single" name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror" style="width: 100%">
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('namcustomer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            
                            <div class="mb-3">
                                <label for="Sales"  class="col-md-4 col-form-label">{{ __('Sales') }}</label>
                                <table class="table table-bordered" id="productTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;">Product</th>
                                            <th style="width: 20%;">Quantity</th>
                                            <th style="width: 20%;">Price</th>
                                            <th style="width: 20%;">Rate</th>
                                            <th style="width: 20%;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 20%;">
                                                <select class="js-product-single0 product-list" name="product[0][product_id]" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="width: 100%">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{$product->id}}" data-price="{{$product->price}}" {{ old('product_id', auth()->id()) == $user->id ? 'selected' : '' }}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 20%;">
                                                <input type="number" class="qty" name="product[0][quantity]">
                                            </td>
                                            <td style="width: 20%;" class="productPrice0" name="price">
                                            </td>
                                            <td style="width: 20%;"  >
                                                <input type="number" name="rate[0]" class="rate">
                                            </td>
                                            <td style="width: 20%;" class="single_total" name="total[0]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;">
                                                <select class="js-product-single1 product-list" name="product[1][product_id]" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="width: 100%">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{$product->id}}" data-price="{{$product->price}}" {{ old('product_id', auth()->id()) == $user->id ? 'selected' : '' }}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 20%;">
                                                <input type="number" class="qty" name="product[1][quantity]">
                                            </td>
                                            <td style="width: 20%;" class="productPrice1" name="price">
                                            </td>
                                            <td style="width: 20%;" >
                                                <input type="number" name="rate[1]" class="rate">
                                            </td>
                                            <td style="width: 20%;" class="single_total" name="total[1]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;">
                                                <select class="js-product-single2 product-list" name="product[2][product_id]" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="width: 100%">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{$product->id}}" data-price="{{$product->price}}" {{ old('product_id', auth()->id()) == $user->id ? 'selected' : '' }}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 20%;">
                                                <input type="number" class="qty" name="product[2][quantity]">
                                            </td>
                                            <td style="width: 20%;" class="productPrice2" name="price">
                                            </td>
                                            <td style="width: 20%;" >
                                                <input type="number" name="rate[2]" class="rate">
                                            </td>
                                            <td style="width: 20%;" class="single_total" name="total[2]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;">
                                                <select class="js-product-single3 product-list" name="product[3][product_id]" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="width: 100%">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{$product->id}}" data-price="{{$product->price}}" {{ old('product_id', auth()->id()) == $user->id ? 'selected' : '' }}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 20%;">
                                                <input type="number" class="qty" name="product[3][quantity]">
                                            </td>
                                            <td style="width: 20%;" class="productPrice3" name="price">
                                            </td>
                                            <td style="width: 20%;" >
                                                <input type="number" name="rate[3]" class="rate">
                                            </td>
                                            <td style="width: 20%;" class="single_total" name="total[3]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;">
                                                <select class="js-product-single4 product-list" name="product[4][product_id]" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="width: 100%">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{$product->id}}" data-price="{{$product->price}}" {{ old('product_id', auth()->id()) == $user->id ? 'selected' : '' }}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 20%;">
                                                <input type="number" class="qty" name="product[4][quantity]">
                                            </td>
                                            <td style="width: 20%;" class="productPrice4" name="price">
                                            </td>
                                            <td style="width: 20%;" >
                                                <input type="number" name="rate[4]" class="rate">
                                            </td>
                                            <td style="width: 20%;" class="single_total" name="total[4]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:20%; text-align:right" colspan="4">total:</td>
                                            <td style="width:20%; " ><span class="total"></span><input type="hidden" class="total_input" name="total" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                            <div class=" mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>          
        </div>   
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/sale.js'])

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $(document).ready(function() {
            $('.js-user-single').select2();
        });
        

        $(document).ready(function() {
            $(document).on('change', '.product-list' ,function() {

                if($(this).val() !== ''){
                    $(this).closest('tr').find('.qty').val(1);
                    $(this).closest('tr').find('.rate').val(1);
                    var price = $('option:selected', this).data('price');
                    var index = $(this).closest('tr').index();
                    // console.log(index);
                    var editedClass = 'productPrice'+index;
                    // console.log(editedClass);
                    $('.' + editedClass).text(price);
                    updatePrice($(this));
                    updateTotal();
                }

            });

            $(document).on('change', '.qty' ,function() {
                updatePrice($(this));
                updateTotal();  
            });

            $(document).on('change', '.rate' ,function() {
                updatePrice($(this));
                updateTotal();
            });


            function updatePrice(e){
                var total = 0;
                var name = $(e).attr('name');
                var number = name.match(/\d+/)[0];
                
                // console.log(number);
                var test = $('.productPrice' + number).text() * (e).closest('tr').find('.qty').val();

                var rate = (e).closest('tr').find('.rate').val();
                var finalPrice = test * rate;

                $(e).closest('tr').find('.single_total').text(finalPrice);
            }

            function updateTotal(){
                var total = 0;
                var arr = [];

                $('.single_total').each(function(){
                    var text = $(this).text();
                    var number = parseInt(text);
                    if (!isNaN(number)) {
                        arr.push(number);
                    }   
                });

                var total = arr.reduce(function(a, b){
                    return a + b;
                }, 0);

                console.log(total);
                $('.total_input').val(total);
                $('.total').text(total);
                
            }
            

            $('.js-user-single').change(function(){
                var user_id = $(this).val();
                $.ajax({
                    url: '/sale/getStore',
                    type: 'GET',
                    data: {user_id: user_id},
                    success: function(data){
                        console.log(data);
                        var dropdown = $('#store_id');
                        dropdown.empty();
                        $.each(data, function(i, item) {
                            dropdown.append($('<option>', { 
                                value: item.id,
                                text : item.name 
                            }));
                        });                    
                    }
                });
            })

        });
    </script>
@endsection