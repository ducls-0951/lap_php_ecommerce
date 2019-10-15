<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <img class="item-slick1 item1-slick1" src="{{ asset('storage/images/slide4.jpg') }}">
            <img class="item-slick1 item2-slick1" src="{{ asset('storage/images/slide5.jpg') }}">
            <img class="item-slick1 item3-slick1" src="{{ asset('storage/images/slide6.jpg') }}">
        </div>
    </div>
</section>

<section class="bgwhite p-t-45 p-b-58">
    <div class="container">
        <div class="sec-title p-b-22">
            <h3 class="m-text5 t-center">
                {{ __('product.ourProduct') }}
            </h3>
        </div>
        <div class="tab01">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.top_rate') }}">{{ __('product.topRate') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" >{{ __('product.new') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.recently_viewed') }}">{{ __('product.preview') }}</a>
                </li>
            </ul>
            <div class="tab-content p-t-35">
                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                            <img src="{{ asset('storage/product_images/' . $product[config('top_rate.image')]->image) }}" alt="{{ __('header.img') }}"> {{--image product--}}
                                        <div class="block2-overlay trans-0-4">
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    {{ __('product.addToCart') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="{{ route('products.show', ['product' => $product[config('top_rate.info')]->id]) }}" class="block2-name dis-block s-text3 p-b-5">
                                            {{ $product[config('top_rate.info')]->name }}
                                        </a>

                                        <span class="block2-price m-text6 p-r-5">
                                            {{ $product[config('top_rate.info')]->price . __('product_list.$') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
