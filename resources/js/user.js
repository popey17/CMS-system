$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.detail__btn', function() {
        var id = $(this).attr('data-id');
        // console.log(id);
        $('.right__content').html('');
        $.ajax({
            url: `/user/${id}/detail`,
            type: 'GET',
            success: function(res) {
                // console.log(res);
                $('.right__content').html(res);
            }
        });
    });


    //delete confirm
    $(document).on('click', '.delete', function() {
        var name = $(this).attr('data-name');
        // console.log(name);
        $('.delete-user').text(name);
    });

    //pass url to modal
    $(document).on('show.bs.modal', '#deleteUserBox', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var url = "/user/" + userId + "/delete";
        $('.user_del').attr('href', url);
    });
    
    

    //ajax serach
    var searchTimeout;
    $(document).on('keyup', '.search__input', function search() {
        // console.log($('.search__input').val());

        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {
            // console.log($('.search__input').val());
            $.ajax({
                url: '/user/search',
                method: 'GET',
                data: {
                    query: $('.search__input').val()
                },
                success: function(data) {
                    // console.log(data);
                    $('.card__container__wrapper').html(data);
                }
            });
        }, 300);
    });

    //ajax Sort
    $(document).on('click', '.sort_btn', function() {
        var sort = $(this).parent().prev('span').attr('data-sort');
        var order = $(this).attr('data-order');
        // console.log(sort);
        // console.log(order);
        $.ajax({
            url: '/user/sort',
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

});