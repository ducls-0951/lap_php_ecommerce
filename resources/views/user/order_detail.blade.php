@extends('layouts.master')
@section('content')
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-3">{{ __('cart.product') }}</th>
                            <th class="column-3">{{ __('cart.price') }}</th>
                            <th class="column-3">{{ __('cart.quantity') }}</th>
                            <th class="column-3">{{ __('cart.total') }}</th>
                        </tr>
                        @foreach ($productList as $product)
                            <tr class="table-row">
                                <th class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{ asset('storage/product_images/' . $product['productImage']) }}" alt="{{ __('cart.img_product') }}">
                                    </div>
                                </th>
                                <th class="column-3">{{ $product['productName'] }}</th>
                                <th class="column-3">{{ $product['quantity'] }}</th>
                                <th class="column-3">{{ $product['price'] }}{{ __('cart.$') }}</th>
                                <th class="column-3">{{ $product['totalPrice'] }}{{ __('cart.$') }}</th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
