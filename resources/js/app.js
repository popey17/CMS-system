import './bootstrap';

$(document).ready(function() {

    // toggle eye icon 
    $('#password').keyup(function() {
        var target = $(this).siblings('i');
        var val = $(this).val();

        if (val) {
            target.show();
        }else {
            target.hide();
            $(this).attr('type', 'password')
        }
        
    });

    // function to show password
    $('.password__toggle').click(function() {
        var target = $('.password__container > input');

        target.attr('type', target.attr('type') === 'password' ? 'text' : 'password');
    }
    );

    //function to changge side bar active style
    var currentURL = window.location.pathname;
    let part = currentURL.split("/");

    // console.log("parts:",part);
    var navLink = $('.nav-item');
    

    // if (currentURL.endsWith('/')) {
    //     currentURL = currentURL.slice(0, -1);
    // }

    // console.log("currentURL:",currentURL);

    navLink.each(function() {
        var linkPath = $(this).attr('href');
        // console.log("linkPath:",linkPath);

        if (linkPath.includes(part[1])) {
            $(this).parent().parent().addClass('active');
        }
    });

    
    //toggle sub menu and save state to session
    $('.sub__menu-toggle').click(function() {
        $('.side__menu').toggleClass('menu__active');
        $(this).parent().parent().toggleClass('menu__active');

        var sidebarState = $('.side__menu').hasClass('menu__active') ? 'menu__active' : '';
        // console.log("sidebarState:",sidebarState);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/save-sidebar-state',
            type: 'POST',
            data: {
                sidebarState: sidebarState
            }
        });
    });

    //toggle serach box
    $('.search-toggle').click(function (){
        $('.search__input').toggleClass('show')
        $(this).siblings('.search__input').focus();
    })

    //open right bar and save session function
    const openRightBar = () => {    
        $('.side__bar__right').addClass('right__bar__active');
        $('.main__content__item').addClass('right__bar__active');

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $.ajax({
        //     url: '/save-right-sidebar-state',
        //     type: 'POST',
        //     data: {
        //         rightSidebarState: 'right__bar__active'
        //     }
        // });
    }

    //close right bar and save sesstion function
    const closeRightBar = () => {
        $('.side__bar__right').removeClass('right__bar__active');
        $('.main__content__item').removeClass('right__bar__active');

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $.ajax({
        //     url: '/save-right-sidebar-state',
        //     type: 'POST',
        //     data: {
        //         rightSidebarState: ''
        //     }
        // });
    }

    //call open right bar function
    $(document).on('click', '.detail__btn', openRightBar)

    //call close right bar function
    $('.right__menu-close').click(closeRightBar);
    $(window).on('popstate', closeRightBar);
    $(window).on('unload', closeRightBar);

    function previewFile() {
        var fileInput = $('#profile_image')[0]?$('#profile_image')[0]:$('#logo')[0];
        var file = fileInput.files[0];
        // console.log(file);
    

    var preview = document.querySelector('#preview_image');

    // Make sure the file input is not empty
    if (file) {
        var reader = new FileReader();
        $('.remove__img').css({'display': 'flex'});
        
        // Set up the onload event for the FileReader
        reader.onloadend = function () {
            preview.src = reader.result;
        };
        
        // Read the file as a data URL
        reader.readAsDataURL(file);
        }
    }

    // Add an onchange event to the file input field
    $('#profile_image').on('change', previewFile);
    $('#logo').on('change', previewFile);

    //remove image
    $('.remove__img').click(function() {
        var baseUrl = window.location.origin;
        var fileInput = $('#profile_image')[0]?$('#profile_image')[0]:$('#logo')[0];
        fileInput.value = '';
        var file = fileInput.files[0];
        // console.log(file);

        $('#preview_image').attr('src', baseUrl + '/img/profile/dummy.jpg');
        $('#logo').attr('src', baseUrl + '/img/profile/dummy.jpg');
        $(this).css({'display': 'none'});
    });

    //remove notification
    setTimeout(function() {
        $('.notification-popup').remove();
    }, 5000);

    //show title on hover nav link
    $('.nav-item').parent().hover(
        function() {
            // This function is executed when the mouse enters the element
            var title = $(this).attr('data-title');
            var titleDiv = `<span class="nav__item__title">${title}</span>`;
            $(this).append(titleDiv);
        }, 
        function() {
            // This function is executed when the mouse leaves the element
            $(this).find('.nav__item__title').remove();
        }
    );

    //ajax pagination

    function fetch_data(page , urlMain){
        $.ajax({
            url:`/${urlMain}/fetch_data?page=`+page,
            type:'GET',
            success:function(data) {
            console.log(data);
            $('.card__container__wrapper').html(data);
            $('.content__body').animate({ scrollTop: 0 }, 'fast'); 
            }
        });
    }

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        var urlMain = $('.pagination__warpper').attr('data-url');
        fetch_data(page, urlMain);
        });

    //Company register slide
    var sideitems = $('.register_content');

    var current = 0;
    $('.next_btn').click(function() {
        current++;
        console.log(current)
        $(sideitems[current - 1]).addClass('hide');
        $(sideitems[current]).removeClass('hide');
    });

    $('.prev_btn').click(function() {
        current--;
        console.log(current)
        $(sideitems[current]).removeClass('hide');
        $(sideitems[current + 1]).addClass('hide');
    });
});

