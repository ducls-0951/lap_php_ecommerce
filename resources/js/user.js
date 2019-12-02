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
            },
        });
    });

    $('.btn-cancel-order').click(function (event) {
        event.preventDefault();

        let order_id = $(this).attr('data-id');
        let url = window.location.origin + `/users/order/` + order_id;

        $.ajax({
            url: url,
            method: 'PUT',
            success: function (dataResponse) {
                if (dataResponse.flag) {
                    $('#order-status-' + order_id).removeAttr('class');
                    $('#order-status-' + order_id).addClass('badge badge-danger');
                    $('#order-status-' + order_id).html('Cancel');
                    swal('Cancel order', 'successfully', 'success');
                } else {
                    swal('Cancel order', 'fail', 'error');
                }
            },
            error: function (dataResponse) {
                swal('Cancel order', 'fail', 'error');
            },
        });
    });

    $('.btn-cancel-suggest').click(function () {
        let suggestId = $(this).attr('data-id');
        let url = window.location.origin + '/suggests/' + suggestId;
         $.ajax({
             url: url,
             method: 'PUT',
             data: suggestId,
             success: function (dataResponse) {
                 if (dataResponse.flag) {
                     $('#suggest-status-' + suggestId).removeAttr('class');
                     $('#suggest-status-' + suggestId).attr('class', 'badge badge-danger');
                     $('#suggest-status-' + suggestId).html('Cancel');
                     $('button[data-id=' + suggestId + ']').remove();
                     swal('Cancel', 'suggest successfully!', 'success');
                 } else {
                     swal('Cancel', 'suggest fail!', 'error');
                 }
             },
             error: function(dataResponse) {
                 swal('Cancel', 'suggest fail!', 'error');
             }
         })
    });

    $('.btn-edit-suggest').click(function () {
        let suggestId = $(this).attr('data-id');
        let url = window.location.origin + '/suggests/edit/' + suggestId;

        $.ajax({
            url: url,
            method: 'GET',
            success: function (dataResponse) {
                if (dataResponse.flag) {
                    $('#product-name').val(dataResponse.suggest.product_name);
                    $('#product-price').val(dataResponse.suggest.price);
                    $('#product-description').val(dataResponse.suggest.description);
                    $('.btn-submit-edit-suggest').attr('value', suggestId);
                    $('#modal-form-edit-suggest').modal('show');
                } else {
                    swal('Ops...', 'something wrong', 'error');
                }
            },
            error: function () {
                swal('Ops...', 'something wrong', 'error');
            },
        });
    });

    $('.btn-submit-edit-suggest').click(function (event) {
        event.preventDefault();

        let suggestId = $(this).val();
        let url = window.location.origin + '/suggests/update/' + suggestId;
        let url_image = window.location.origin + '/storage/product_images/';
        let formData = new FormData();
        formData.append('product_name', $('#product-name').val());
        formData.append('product_price', $('#product-price').val());
        formData.append('product_description', $('#product-description').val());
        formData.append('product_image', $('input[type=file]')[0].files[0]);
        formData.append('_method', 'PUT');
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (dataResponse) {
                if (dataResponse.flag) {
                    $('#suggest-product-name-' + suggestId).html(dataResponse.suggest.product_name);
                    $('#suggest-price-' + suggestId).html(dataResponse.suggest.price);
                    $('#suggest-description-' + suggestId).html(dataResponse.suggest.description);
                    $('#suggest-image-' + suggestId).attr('src', url_image + dataResponse.suggest.image);
                    $('#modal-form-edit-suggest').modal('hide');
                    swal('Edit', 'suggest successfully!', 'success');
                }
            },
            error: function () {
                swal('Ops...', 'something wrong!', 'error');
            }
        });
    });
});
