$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //ajax Sort
    $(document).on('click', '.customer_sort_btn', function() {
        var sort = $(this).parent().prev('span').attr('data-sort');
        var order = $(this).attr('data-order');
        // console.log(sort);
        // console.log(order);
        $.ajax({
            url: '/customer/sort',
            method: 'GET',
            data: {
                sort: sort,
                order: order
            },
            success: function(data) {
                // console.log(data);
                $('.card__container__wrapper').html(data);
            }
        });
    });

    //ajax bin Sort
    $(document).on('click', '.deleted_customer_sort_btn', function() {
        var sort = $(this).parent().prev('span').attr('data-sort');
        var order = $(this).attr('data-order');
        // console.log(sort);
        // console.log(order);
        $.ajax({
            url: '/customer/bin/sort',
            method: 'GET',
            data: {
                sort: sort,
                order: order
            },
            success: function(data) {
                // console.log(data);
                $('.card__container__wrapper').html(data);
            }
        });
    });

    //ajax serach
    var searchTimeout;
    $(document).on('keyup', '.customer__search__input', function search() {
        // console.log($('.search__input').val());

        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {
            // console.log($('.customer__search__input').val());
            $.ajax({
                url: '/customer/search',
                method: 'GET',
                data: {
                    query: $('.customer__search__input').val()
                },
                success: function(data) {
                    // console.log(data);
                    $('.card__container__wrapper').html(data);
                }
            });
        }, 300);
    });

    //ajax serach
    var searchTimeout;
    $(document).on('keyup', '.deleted__search__input', function search() {
        // console.log($('.search__input').val());

        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {
            // console.log($('.customer__search__input').val());
            $.ajax({
                url: '/customer/bin/search',
                method: 'GET',
                data: {
                    query: $('.deleted__search__input').val()
                },
                success: function(data) {
                    // console.log(data);
                    $('.card__container__wrapper').html(data);
                }
            });
        }, 300);
    });

    //delete confirm
    var deleteConfirm = function() {
        var name = $(this).attr('data-name');
        console.log(name);
        $('.delete-customer').text(name);
    }
    
    $(document).on('click', '.customer-delete', deleteConfirm);
    
    $(document).on('click', '.customer-restore', deleteConfirm);

    //pass url to modal delete
    $(document).on('show.bs.modal', '#deleteCustomerBox', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var url = "/customer/" + userId + "/delete";
        $('.customer_del').attr('href', url);
    });
    
    //pass url to modal permantent delete
    $(document).on('show.bs.modal', '#purgeCustomerBox', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var url = "/customer/" + userId + "/purge";
        $('.customer_purge').attr('href', url);
    });


    //pass url to modal restore
    $(document).on('show.bs.modal', '#restoreCustomerBox', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var url = "/customer/" + userId + "/restore";
        $('.customer_restore').attr('href', url);
    });

});