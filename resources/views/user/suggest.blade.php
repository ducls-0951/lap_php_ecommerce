@extends('layouts.master')
@section('content')
    <div class="container mb-2">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="{{ route('suggests.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input id="product-name" type="text" class="form-control" name="product_name" placeholder="{{ __('user.product_name') }}" required>
                    </div>
                    <div class="form-group">
                        <input id="product-price" type="text" class="form-control" name="product_price" placeholder="{{ __('user.product_price') }}" required>
                    </div>
                    <div class="form-group">
                        <textarea id="product-description" type="text" class="form-control" name="product_description" placeholder="{{ __('user.product_description') }}" required></textarea>
                    </div>
                    <div class="form-group">
                        <input id="product-image" type="file" class="form-control" name="product_image" required>
                    </div>
                    <button class="btn btn-info ml-auto" type="submit">{{ __('user.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
