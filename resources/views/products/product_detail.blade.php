@extends('layouts.master')
@section('content')
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>

                    <div class="slick3">
                        @foreach ($product->images as $image)
                            <div class="item-slick3" data-thumb="{{ asset('storage/product_images/' . $image->image) }}">
                                <div class="wrap-pic-w pic-product-detail">
                                    <img src="{{ asset('storage/product_images/' . $image->image) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{ $product->name }}
                </h4>

                <span class="m-text17">
                    {{ $product->price }} {{ __('product_list.$') }}
                </span>
                <p class="s-text8 p-t-10">
                    {{ $product->description }}
                </p>

                <!--  -->
                <div class="p-t-33 p-b-60">
                    <div class="flex-m flex-w p-b-10">
                        <div class="s-text15 w-size15 t-center">
                            {{ __('product_detail.size') }}
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size10">
                            <select class="selection-2" name="size">
                                <option>{{ __('product_detail.select_size') }}</option>
                                @foreach ($product->sizes as $size)
                                    <option value="{{ $size->name }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex-m flex-w">
                        <div class="s-text15 w-size15 t-center">
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size10">
                        </div>
                    </div>

                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="{{ config('product.quantity_min') }}">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    {{ __('product.addToCart') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        {{ __('product_detail.description') }}
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        {{ __('product_detail.review') }}
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
