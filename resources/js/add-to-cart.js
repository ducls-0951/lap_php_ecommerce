$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add_to_cart').click(function () {
        event.preventDefault();
        let product_id = $('.product_id').val();
        let num_product = $('.num-product').val();
        let size = $('.size').val();
        let product_name = $('.product-detail-name').data('value');

        $.ajax({
            type: 'POST',
            url: '/cart/add-to-cart',
            data: {'product_id' : product_id, 'num_product' : num_product, 'size' : size},
            success: function(flag) {
                swal(product_name, "is added to cart !", "success");
            }
        })
    });

    $('.js-show-header-dropdown').one('click', function () {
        event.preventDefault();

        $.ajax({
            xhrFields: { withCredentials: true },
            type: 'GET',
            url : '/cart/show',
            data: $.get(window.location.origin),
            success: function (result) {
                $.each(result, function(key, value) {
                    let url = window.location.origin + '/storage/product_images/' + value.product_image;
                    let html = `
                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="` + url + `" alt="">
                            </div>
                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">` + value.product_name +
                                `</a>
                                <span class="header-cart-item-info">` + value.quantity + ' * ' + value.price + '$' +
                                `</span>
                            </div>
                        </li>
                    `;
                    $('.header-cart-wrapitem').append(html);
                });
            }
        })
    })
});
