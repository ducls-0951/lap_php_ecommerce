$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.logout').click(function() {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/logout',
            success: function(result) {
                if (result.status) {
                    window.location.replace(result.redirect);
                }
            }
        });
    });
});
