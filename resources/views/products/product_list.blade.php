<div class="container mt-3">
    <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide my-2" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ config('product.0') }}" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ config('product.1') }}"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ config('product.2') }}"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block slide" src="">
                </div>
                <div class="carousel-item">
                    <img class="d-block slide" src="">
                </div>
                <div class="carousel-item">
                    <img class="d-block slide" src="">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('product_list.previous') }}</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('product_list.next') }}</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="header pt-2">
                <p class=" h5 text-center text-danger text-uppercase"><i class="fab fa-hotjar pr-2"></i>{{ __('product_list.hot_product') }}<i class="fab fa-hotjar pl-2"></i></p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 pb-2">
                    <div class="card h-100">
                        <a href="#">
                            <img class="card-img-top" src="" alt="">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title product_name"></h4>
                            <h5 class="product_price"></h5>
                            <p class="card-text product_description">
                            </p>
                            <small class="text-muted product_rating"></small>
                        </div>
                        <div class="card-footer">
                            <button type="button" class=" ml-8 btn btn-success"><i class="fas fa-cart-plus mr-2"></i>{{ __('product_list.add_to_cart') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header pt-2">
                <p class=" h5 text-center text-info text-uppercase"><i class="fas fa-water pr-2"></i>{{ __('product_list.preview_product') }}<i class="fas fa-water pl-2"></i></p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card h-100">
                        <a href="#">
                            <img class="card-img-top" src="" alt="">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title product_name"></h4>
                            <h5 class="product_price"></h5>
                            <p class="card-text product_description">
                            </p>
                            <small class="text-muted prodcut_rating"></small>
                        </div>
                        <div class="card-footer">
                            <button type="button" class=" ml-8 btn btn-success"><i class="fas fa-cart-plus mr-2"></i>{{ __('product_list.add_to_cart') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
