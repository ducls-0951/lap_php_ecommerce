$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#user-btn-save').click(function (event) {
        event.preventDefault();

        let user_id = $(this).val();
        let oldPassword = $('#old-password').val();
        let newPassword = $('#new-password').val();
        let confirmPassword = $('#confirm-password').val();
        let formData = new FormData();
        let url = window.location.origin + '/users/' + user_id;
        let urlImage = window.location.origin + '/storage/images/';
        let html = '';

        formData.append('image', $('#image')[0].files[0]);
        formData.append('old_password', oldPassword);
        formData.append('password', newPassword);
        formData.append('password_confirmation', confirmPassword);
        formData.append('_method', 'PUT');

        $.ajax({
            method: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (dataResponse) {
                if (dataResponse.flag) {
                    if (dataResponse.flag) {
                        $('.avatar-user').attr('src', urlImage + dataResponse.user.image);
                        swal('Profile', 'update successfully!', 'success');
                    }
                } else {
                    swal('Profile', 'update fail!', 'error');
                }
            },
            error: function (dataReceive) {
                $.each(dataReceive.responseJSON.errors, function (key, value) {
                    html += `<li class="text-danger">` + value + `</li>`;
                });
                console.log(html);
                swal({
                    title: 'Ops...',
                    content: {
                        element: 'ul',
                        attributes: {
                            innerHTML: html
                        }
                    },
                    icon: 'error'
                });
            }
        })

    })
});
