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
});
