@extends('admin.layouts.master')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-overflow">
                            <table id="dt-opt" class="table table-hover table-xl product-list">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox p-0">
                                            <input id="selectable1" type="checkbox" class="checkAll" name="checkAll">
                                            <label for="selectable1"></label>
                                        </div>
                                    </th>
                                    <th>{{ __('admin.name') }}</th>
                                    <th>{{ __('admin.image') }}</th>
                                    <th>{{ __('admin.category') }}</th>
                                    <th>{{ __('admin.price') }}</th>
                                    <th>{{ __('admin.price_sale') }}</th>
                                    <th>{{ __('admin.size') }}</th>
                                    <th>{{ __('admin.quantity') }}</th>
                                    <th>{{ __('admin.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr id="{{ $product[config('product.info')]->id }}">
                                        <td>
                                            <div class="checkbox">
                                                <input id="selectable2" type="checkbox">
                                                <label for="selectable2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="title">{{ $product[config('product.info')]->name }}</span>
                                        </td>
                                        <td><img class="admin-product-image"
                                                 src="{{ asset('storage/product_images/' . $product[config('product.image')]->image)}}"
                                                 alt=""></td>
                                        <td>{{ $product[config('product.info')]->category->name }}</td>
                                        <td>{{ $product[config('product.info')]->price }}</td>
                                        <td>{{ $product[config('product.info')]->price_sale }}</td>
                                        <td>{{ $product[config('product.product_size')] }}</td>
                                        <td>{{ $product[config('product.info')]->quantity }}</td>
                                        <td class="font-size-18">
                                            <button type="button" class="btn btn-info btn-edit-product-admin"
                                                    value="{{ $product[config('product.info')]->id }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-del-product-admin"
                                                    value="{{ $product[config('product.info')]->id }}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade form-edit" id="modal-lg">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="p-15 m-v-40">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <form enctype="multipart/form-data">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row m-t-30">
                                                            <div class="col-md-6">
                                                                <div class="p-h-10">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">{{ __('admin.product_name') }}</label>
                                                                        <input id="product-name" type="text"
                                                                               class="form-control" name="product_name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-h-10">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">{{ __('admin.quantity') }}</label>
                                                                        <input id="product-quantity" type="number"
                                                                               class="form-control"
                                                                               name="product_quantity">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-t-30">
                                                            <div class="col-md-6">
                                                                <div class="p-h-10">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">{{ __('admin.price') }}</label>
                                                                        <input id="product-price" type="number"
                                                                               class="form-control" name="product_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-h-10">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">{{ __('admin.price_sale') }}</label>
                                                                        <input id="product-price-sale" type="number"
                                                                               class="form-control"
                                                                               name="product_price_sale">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-t-30">
                                                            <div class="col-md-6">
                                                                <div class="p-h-10">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">{{ __('admin.category') }}</label>
                                                                        <select id="product-category"
                                                                                class="form-control form-control-lg"
                                                                                name="product_category">
                                                                            @foreach($categories as $category)
                                                                                <option
                                                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-h-10">
                                                                    <h5>{{ __('admin.size') }}</h5>
                                                                    @foreach ($sizes as $size)
                                                                        <div class="checkbox d-inline-flex pl-1 pb-2">
                                                                            <input id="{{ 'product' . $size->id }}"
                                                                                   class="checkbox-input"
                                                                                   type="checkbox"
                                                                                   name="product_size[]"
                                                                                   value="{{ $size->id }}">
                                                                            <label id="product-size"
                                                                                   for="{{ 'product' . $size->id }}">{{ $size->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-t-30">
                                                        <div class="col-md-6">
                                                            <div class="p-h-10">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">{{ __('admin.image') }}</label>
                                                                        <input id="product-image"
                                                                               name="product_image" type="file"
                                                                               class="form-control-file">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="p-h-10">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label">{{ __('admin.description') }}</label>
                                                                    <textarea class="form-control"
                                                                              id="product-description"
                                                                              name="product_description"
                                                                              rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <row class="m-t-30">
                                                        <div class="col-md-2 offset-6">
                                                            <div class="p-h-10">
                                                                <button type="submit" id="btn-submit"
                                                                        class="btn btn-info">{{ __('admin.submit')  }}</button>
                                                            </div>
                                                        </div>
                                                    </row>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
