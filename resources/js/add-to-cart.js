$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add-to-cart').click(function (event) {
        event.preventDefault();
        let product_id = $('.product_id').val();
        let num_product = $('.num-product').val();
        let size = $('.size').val();
        let product_name = $('.product-detail-name').data('value');

        $.ajax({
            type: 'POST',
            url: '/carts/add-to-cart',
            data: {'product_id' : product_id, 'num_product' : num_product, 'size' : size},
            success: function(data) {
                if (data.flag) {
                    swal(product_name, "is added to cart !", "success");
                }

                $('.header-icons-noti').text(data.count);
            },
            error: function() {
                swal("Opps...", "Something went wrong !", "error");
            }
        })
    });

    $('.js-show-header-dropdown').click(function (event) {
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url : '/carts/show',
            success: function (data) {
                let html = "";
                $.each(data.products, function(key, value) {
                    let url_image = window.location.origin + '/storage/product_images/' + value.product_image;
                    let url_product = window.location.origin + '/products/' + value.product_id;
                    html += `
                        <li id="` + value.product_id + `" class="header-cart-item" data-id="` + value.product_id + `">
                            <div class="header-cart-item-img">
                                <img src="` + url_image + `" alt="IMG" class="product_image">
                            </div>
                            <div class="header-cart-item-txt">
                                <button class="text-danger delete-product-cart del-product" data-id="` + value.product_id + `">
                                    Delete
                                </button>
                                <a href="` + url_product + `" class="header-cart-item-name">` + value.product_name +
                                `</a>
                                <span class="header-cart-item-info">` + value.quantity + ' * ' + value.price + '$' +
                                `</span>
                            </div>
                        </li>
                    `;
                });
                $('.header-cart-wrapitem').html(html);
            }
        })
    });

    $('.header-cart-wrapitem').on("click", "button.del-product", function () {
        let product_id = $(this).attr('data-id');

        $.ajax({
            type: 'DELETE',
            url: '/carts/deleteCart',
            data: {'product_id' : product_id},
            success: function(data) {
                if (data.flag) {
                    $('#' + product_id).remove();
                    data.count -= 1;
                    $('.header-icons-noti').text(data.count);
                    swal('Delete product', 'is successful !', 'success');
                } else {
                    swal('Ops...', 'something wrong !', 'error');
                }

            },
            error: function() {
                swal('Ops...', 'something wrong !', 'error');
            }
        })
    });

    $('.btn-del-product').click(function (event) {
        event.preventDefault();
        let product_id = $(this).val();

        $.ajax({
            type: 'DELETE',
            url: '/carts/deleteCart',
            data: {product_id : product_id},
            success: function(data) {
                if(data.flag) {
                    $('#' + product_id).remove();
                    data.count -= 1;
                    $('.header-icons-noti').text(data.count);
                    swal('Delete product', 'is successful !', 'success');
                } else {
                    swal('Ops...', 'something wrong !', 'error');
                }
            },
            error: function() {
                swal('Ops...', 'something wrong !', 'error');
            }
        })
    });
});
