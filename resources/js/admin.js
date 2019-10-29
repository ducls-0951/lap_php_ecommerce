$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-del-product-admin').click(function () {
        let product_id = $(this).val();

        if (confirm('Are you sure?')) {
            $.ajax({
                type: 'DELETE',
                url: '/admin/products/delete',
                data: {'product_id' : product_id},
                success: function(result) {
                    if (result.flag) {
                        $('#' + product_id).remove();
                        swal('Product', 'is deleted successfully!', 'success');
                    } else {
                        swal('Ops...', 'something wrong!', 'error');
                    }
                },
                error: function() {
                    swal('Ops...', 'something wrong!', 'error');
                }
            })
        }
    })
});
