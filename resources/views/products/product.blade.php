@extends('layouts.master')
@section('content')
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            {{ __('product.categories') }}
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="#" class="s-text13 active1">
                                    {{ __('product.all') }}
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                @if (!$category->parent_id)
                                    <li class="p-t-4">
                                        <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="s-text13">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="{{ __('product.search') }}">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size10 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option>{{ __('product.default_sorting') }}</option>
                                    <option>{{ __('product.short_popularity') }}</option>
                                    <option>{{ __('product.short_price_low') }}</option>
                                    <option>{{ __('product.short_price_high') }}</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size10 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option value="">{{ __('product.size') }}</option>
                                    <option value="{{ config('product.price_very_low') }}">{{ __('product.fillter_fifth') }}</option>
                                    <option value="{{ config('product.price_low') }}">{{ __('product.fillter_first') }}</option>
                                    <option value="{{ config('product.price_medium') }}">{{ __('product.fillter_second') }}</option>
                                    <option value="{{ config('product.price_high') }}">{{ __('product.fillter_third') }}</option>
                                    <option value="{{ config('product.price_very_high') }}">{{ __('product.fillter_fourth') }}</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2 pic-product">
                                        <img src="{{ asset('storage/product_images/' . $product[config('product.image')]->image) }}" alt="{{ __('product.img_product') }}">

                                        <div class="block2-overlay trans-0-4">
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    {{ __('product.add_to_cart') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="{{ route('products.show', ['product' => $product[config('top_rate.info')]->id]) }}" class="block2-name dis-block s-text3 p-b-5">
                                            {{ $product[config('product.info')]->name }}
                                        </a>

                                        <span class="block2-price m-text6 p-r-5">
                                            {{ $product[config('product.info')]->price }} {{__('product.$')}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-t-26">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
