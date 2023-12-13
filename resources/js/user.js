$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    fetchUserData();

    function fetchUserData() {
        $.ajax({
            type: "GET",
            url: "/fetch-user-data",
            dataType: 'json',
            success: function(response) {
                console.log("response:",response.users);
            }
        });
    }
});