@extends('layouts.master')
@section('content')
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            @if ($carts)
                <form action="{{ route('carts.updateCart') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="container-table-cart pos-relative">
                        <div class="wrap-table-shopping-cart bgwhite">
                            <table class="table-shopping-cart">
                                <tr class="table-head">
                                    <th class="column-1"></th>
                                    <th class="column-3">{{ __('cart.product') }}</th>
                                    <th class="column-3">{{ __('cart.price') }}</th>
                                    <th class="column-3 p-l-70">{{ __('cart.quantity') }}</th>
                                    <th class="column-3">{{ __('cart.size') }}</th>
                                    <th class="column-3">{{ __('cart.total') }}</th>
                                    <th class="column-3"></th>
                                </tr>
                                @foreach ($carts as $cart)
                                    <tr class="table-row" id="{{ $cart['product_id'] }}">
                                        <td class="column-1">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img src="{{ asset('storage/product_images/' . $cart['product_image']) }}" alt="{{ __('cart.img_product') }}">
                                            </div>
                                        </td>
                                        <input type="text" name="product_id_{{ $cart['product_id'] }}"
                                               value="{{ $cart['product_id'] }}" hidden>
                                        <td class="column-3">{{ $cart['product_name'] }}</td>
                                        <td class="column-3">{{ __('cart.$') }}{{ $cart['price'] }}</td>
                                        <td class="column-3">
                                            <div class="flex-w bo5 of-hidden w-size17 ml-5">
                                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                </button>

                                                <input class="size8 m-text18 t-center num-product" type="number"
                                                       name="product_num_{{ $cart['product_id'] }}"
                                                       value="{{ $cart['quantity'] }}">

                                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="column-3">{{ $cart['size'] }}</td>
                                        <td class="column-3">{{ __('cart.$') }}{{ $cart['sub_total'] }}</td>
                                        <td class="column-3">
                                            <button class="btn btn-danger btn-del-product"
                                                    value="{{ $cart['product_id'] }}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                        <div class="size10 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                                {{ __('cart.update_cart') }}
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-3">{{ __('cart.product') }}</th>
                                <th class="column-3">{{ __('cart.price') }}</th>
                                <th class="column-3 p-l-70">{{ __('cart.quantity') }}</th>
                                <th class="column-3">{{ __('cart.size') }}</th>
                                <th class="column-3">{{ __('cart.total') }}</th>
                                <th class="column-3"></th>
                            </tr>
                            <tr class="table-row">

                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                            {{ __('cart.update_cart') }}
                        </button>
                    </div>
                </div>
        @endif

        <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    {{ __('cart.cart_total') }}
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                        {{ __('cart.sub_total') }}
                    </span>
                    <span class="m-text21 w-size20 w-full-sm">
                         {{ __('cart.$') }}{{ $total_price }}
                    </span>
                </div>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					    <span class="s-text18 w-size19 w-full-sm">
						{{ __('cart.shipping') }}
					</span>
                        <div class="w-size20 w-full-sm">
                            <div class="size13 bo4 m-b-12">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address"
                                       placeholder="{{ __('cart.address') }}">
                            </div>

                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="phone"
                                       placeholder="{{ __('cart.phone') }}">
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                        {{ __('cart.total') }}
                    </span>
                        <span class="m-text21 w-size20 w-full-sm">
                        {{ __('cart.$') }}{{ $total_price }}
                        </span>
                    </div>

                    <div class="size15 trans-0-4">
                        <button type="submit"
                                class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn-checkout">
                            {{ __('cart.checkout') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
