const product_quantity = $('#product-quantity');

$('#button-minus').click(function(event) {
    event.preventDefault();
    let quantityMinus = product_quantity.val();
    if (quantityMinus > 1) {
        quantityMinus --;
        product_quantity.val(quantityMinus);
    }
});

$('#button-plus').click(function(event) {
    event.preventDefault();
    let quantityPlus = product_quantity.val();
    quantityPlus ++;
    product_quantity.val(quantityPlus);
});
