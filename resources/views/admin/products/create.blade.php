@extends('admin.layouts.master')
@section('content')
    <div class="page-container">
        <!-- Content Wrapper START -->
        <div class="main-content">
            <div class="container-fluid">
                <form action="{{ route('admin.store_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-t-30">
                                <div class="col-md-5 offset-1">
                                    <div class="p-h-10">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('admin.product_name') }}</label>
                                            <input id="product-name" type="text" class="form-control"
                                                   name="product_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="p-h-10">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('admin.quantity') }}</label>
                                            <input id="product-quantity" type="number" class="form-control"
                                                   name="product_quantity" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-5 offset-1">
                                    <div class="p-h-10">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('admin.price') }}</label>
                                            <input id="product-price" type="number" class="form-control"
                                                   name="product_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="p-h-10">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('admin.price_sale') }}</label>
                                            <input id="product-price-sale" type="number" class="form-control"
                                                   name="product_price_sale">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-5 offset-1">
                                    <div class="p-h-10">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('admin.category') }}</label>
                                            <select class="form-control form-control-lg" name="product_category">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="p-h-10">
                                        <h5>{{ __('admin.size') }}</h5>
                                        @foreach ($sizes as $size)
                                            <div class="checkbox d-inline pl-1 pb-2">
                                                <input id="{{ $size->id }}" type="checkbox" name="product_size[]"
                                                       value="{{ $size->id }}">
                                                <label id="product-size" for="{{ $size->id }}">{{ $size->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-5 offset-1">
                                    <div class="p-h-10">
                                        <form>
                                            <div class="form-group">
                                                <label class="control-label">{{ __('admin.image') }}</label>
                                                <input id="product-image" name="product_image" type="file"
                                                       class="form-control-file">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="p-h-10">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('admin.description') }}</label>
                                            <textarea class="form-control" id="product-description"
                                                      name="product_description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <row class="m-t-30">
                                <div class="col-md-2 offset-6">
                                    <div class="p-h-10">
                                        <button type="submit" class="btn btn-info">{{ __('admin.submit')  }}</button>
                                    </div>
                                </div>
                            </row>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
