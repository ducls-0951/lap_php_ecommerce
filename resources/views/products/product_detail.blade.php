@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="product_detail row mt-4">
            <div class="product_image col">
                <img class="card-img-top img-fluid" src="" alt="">
            </div>
            <div class="product_info col-lg-6 card border-white">
                <div class="card-body">
                    <h5 class="card-title text-info font-weight-bold">{{ __('product_detail.name') }}</h5>
                    <p class="card-text text-info font-weight-bold">{{ __('product_detail.color') }}</p>
                    <p class="card-text text-info font-weight-bold">{{ __('product_detail.status') }}</p>
                    <p class="card-text text-info font-weight-bold">{{ __('product_detail.size') }}</p>
                    <p class="card-text text-info font-weight-bold">{{ __('product_detail.price') }}</p>
                    <p class="card-text text-info font-weight-bold">{{ __('product_detail.description') }}</p>
                    <p class="card-text text-info font-weight-bold">{{ __('product_detail.quantity') }}<input type="number" value="{{ config('product.1') }}" min="{{ config('product.0') }}" max="{{ config('product.10') }}" step="{{ config('product.1') }}"/>
                    </p>
                    <a href="#"><button type="button" class="btn btn-success"><i class="fas fa-cart-plus pr-2"></i>{{ __('product_detail.add_to_cart') }}</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
