$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //ajax Sort
    $(document).on('click', '.sale_sort_btn', function() {
        var sort = $(this).parent().prev('span').attr('data-sort');
        var order = $(this).attr('data-order');
        // console.log(sort);
        // console.log(order);
        $.ajax({
            url: '/sale/sort',
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
    $(document).on('click', '.deletedSale_sort_btn', function() {
        var sort = $(this).parent().prev('span').attr('data-sort');
        var order = $(this).attr('data-order');
        // console.log(sort);
        // console.log(order);
        $.ajax({
            url: '/sale/bin/sort',
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


   //delete confirm
   var deleteConfirm = function() {
    var name = $(this).attr('data-name');
    console.log(name);
    $('.delete-sale').text(name);
}

    $(document).on('click', '.sale-delete', deleteConfirm);
    
    $(document).on('click', '.sale-restore', deleteConfirm);

    //pass url to modal
    $(document).on('show.bs.modal', '#deleteSaleBox', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var url = "/sale/" + userId + "/delete";
        $('.sale_del').attr('href', url);
    });

     //pass url to modal permantent delete
    $(document).on('show.bs.modal', '#purgeSaleBox', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var url = "/sale/" + userId + "/purge";
        $('.sale_purge').attr('href', url);
    });

    //ajax serach
    var searchTimeout;
    $(document).on('keyup', '.sale__search__input', function search() {
                console.log($('.search__input').val());


        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {

            $.ajax({
                url: '/sale/search',
                method: 'GET',
                data: {
                    query: $('.search__input').val()
                },
                success: function(data) {
                    $('.card__container__wrapper').html(data);

                }
            });
        }, 300);
    });


    //ajax serach
    var searchTimeout;
    $(document).on('keyup', '.sale__bin__search__input', function search() {
                console.log($('.search__input').val());


        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {

            $.ajax({
                url: '/sale/search',
                method: 'GET',
                data: {
                    query: $('.search__input').val()
                },
                success: function(data) {
                    $('.card__container__wrapper').html(data);

                }
            });
        }, 300);
    });

});