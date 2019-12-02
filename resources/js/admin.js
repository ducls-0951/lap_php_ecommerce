$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-del-product-admin').click(function () {
        let product_id = $(this).val();

        $.ajax({
            type: 'DELETE',
            url: '/admin/products/delete',
            data: {'product_id': product_id},
            success: function (result) {
                if (result.flag) {
                    $('#' + product_id).remove();
                    swal('Product', 'is deleted successfully!', 'success');
                } else {
                    swal('Ops...', 'something wrong!', 'error');
                }
            },
            error: function () {
                swal('Ops...', 'something wrong!', 'error');
            }
        })
    });

    $('.btn-submit-order').click(function (event) {
        event.preventDefault();

        let order_id = $(this).val();
        let url = '/admin/orders/' + order_id;
        let html = `<span class="badge badge-success">Resolved</span>`;

        $.ajax({
            type: 'PUT',
            url: url,
            data: {'order_id': order_id},
            success: function (data) {
                $('.order-status-' + order_id).html(html);
                $('#btn-submit-' + order_id).prop('disabled', true);
                $('#btn-cancel-' + order_id).prop('disabled', false);
                swal('Update', 'successfully!', 'success');
            },
            error: function () {
                swal('Ops...', 'something wrong!', 'error');
            }
        });
    });

    $('.btn-edit-product-admin').click(function (event) {
        event.preventDefault();

        let product_id = $(this).val();
        let url = '/admin/products/' + product_id + '/edit';

        $.ajax({
            type: 'GET',
            url: url,
            data: {'product_id': product_id},
            success: function (data) {
                $('#product-name').val(data.product.name);
                $('#product-quantity').val(data.product.quantity);
                $('#product-price').val(data.product.price);
                $('#product-price-sale').val(data.product.price_sale);
                $('#product-category').val(data.product.category_id);
                $.each(data.sizes, function (key, value) {
                    $('#product' + value.id).prop('checked', true);
                });
                $('#product-description').val(data.product.description);
                $('#btn-submit').val(product_id);
                $('.form-edit').modal('show');
            }
        })
    });

    $('.btn-cancel-order').click(function (event) {
        event.preventDefault();

        let order_id = $(this).val();
        let url = '/admin/orders/' + order_id;
        let html = `<span class="badge badge-danger">Canceled</span>`;

        $.ajax({
            type: 'DELETE',
            url: url,
            data: {'order_id': order_id},
            success: function (data) {
                $('.order-status-' + order_id).html(html);
                $('#btn-cancel-' + order_id).prop('disabled', true);
                $('#btn-submit-' + order_id).prop('disabled', false);
                swal('Cancel', 'successfully!', 'success');
            },
            error: function () {
                swal('Ops...', 'something wrong!', 'error');
            }
        });
    });

    $('#btn-submit').click(function (event) {
        event.preventDefault();

        let product_id = $(this).val();
        let url = '/admin/products/' + product_id;
        let product_size = [];
        let size = [];
        let html = '';
        $('.checkbox-input:checked').each(function () {
            product_size.push($(this).val());
        });

        let form_data = new FormData();
        form_data.append('product_name', $('#product-name').val());
        form_data.append('product_quantity', $('#product-quantity').val());
        form_data.append('product_price', $('#product-price').val());
        form_data.append('product_price_sale', $('#product-price-sale').val());
        form_data.append('product_category', $('#product-category').val());
        form_data.append('product_size', JSON.stringify(product_size));
        form_data.append('product_image', $('input[type=file]')[0].files[0]);
        form_data.append('product_description', $('#product-description').val());
        form_data.append('_method', 'PUT');

        $.ajax({
            type: 'POST',
            url: url,
            data: form_data,
            contentType: false,
            processData: false,
            success: function (data_response) {
                if (jQuery.isEmptyObject(data_response)) {
                    swal('Image is invalid!', 'Image must be img, jpg or png!', 'error');
                } else {
                    let table_data = $('#' + product_id + ' td');
                    $.each(data_response.product_size, function (key, value) {
                        size.push(value.name);
                    });
                    table_data.eq(1).html(data_response.product_info.name);
                    table_data.eq(2).children('.admin-product-image').attr('src', window.location.origin + '/storage/product_images/' + data_response.product_image.image);
                    table_data.eq(3).html(data_response.product_category);
                    table_data.eq(4).html(data_response.product_info.price);
                    table_data.eq(5).html(data_response.product_info.price_sale);
                    table_data.eq(6).html(size.join(' '));
                    table_data.eq(7).html(data_response.product_info.quantity);
                    swal('Product', 'update successfully!', 'success');
                    $('#product-image').val('');
                    $('.form-edit').modal('hide');
                }
            },
            error: function (data_response) {
                $.each(data_response.responseJSON.errors, function (key, value) {
                    html += `<li class="text-danger">` + value + `</li>`;
                });
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
        });
    });
});
