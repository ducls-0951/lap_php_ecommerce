@extends('admin.layouts.master')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-overflow">
                            <table id="dt-opt" class="table table-hover table-xl">
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
                                        <td><img class="admin-product-image" src="{{ asset('storage/product_images/' . $product[config('product.image')]->image)}}" alt=""></td>
                                        <td>{{ $product[config('product.info')]->price }}</td>
                                        <td>{{ $product[config('product.info')]->price_sale }}</td>
                                        <td>{{ $product[config('product.product_size')] }}</td>
                                        <td>{{ $product[config('product.info')]->quantity }}</td>
                                        <td class="font-size-18">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-del-product-admin" value="{{ $product[config('product.info')]->id }}">
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
            </div>
        </div>
    </div>
@endsection
