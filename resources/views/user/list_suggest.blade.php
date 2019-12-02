@extends('layouts.master')
@section('content')
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 ml-auto">
                    <a href="{{ route('users.show', ['user' => auth()->id()]) }}" class="text-decoration-none">{{ __('user.account') }}</a>
                    <a href="{{ route('users.showOrder', ['user' => auth()->id()]) }}" class="text-decoration-none">{{ __('user.order') }}</a>
                    <a href="{{ route('suggests.listSuggest') }}" class="text-decoration-none">{{ __('user.suggest') }}</a>
                </div>
                <div class="col-sm-11 ml-auto">
                    <div class="container-table-cart pos-relative">
                        <div class="wrap-table-shopping-cart bgwhite">
                            <table class="table-shopping-cart">
                                <tr class="table-head">
                                    <th class="column-1">{{ __('user.suggest_id') }}</th>
                                    <th class="column-1">{{ __('user.product_image') }}</th>
                                    <th class="column-1">{{ __('user.product_name') }}</th>
                                    <th class="column-1">{{ __('user.product_price') }}</th>
                                    <th class="column-1">{{ __('user.product_description') }}</th>
                                    <th class="column-1">{{ __('user.status') }}</th>
                                    <th class="column-1">{{ __('user.action') }}</th>
                                </tr>
                                @foreach ($suggests as $suggest)
                                    <tr class="table-row" id="">
                                        <th class="column-1">{{ $suggest->id }}</th>
                                        <th class="column-1" >
                                            <img class="rounded-circle" id="suggest-image-{{ $suggest->id }}" src="{{ asset('storage/product_images/' . $suggest->image) }}" alt="" width="90" height="90">
                                        </th>
                                        <th class="column-1" id="suggest-product-name-{{ $suggest->id }}">{{ $suggest->product_name }}</th>
                                        <th class="column-1" id="suggest-price-{{ $suggest->id }}">{{ $suggest->price }}{{ __('product.$') }}</th>
                                        <th class="column-1" id="suggest-description-{{ $suggest->id }}">{{ $suggest->description }}</th>
                                        <th class="column-1">
                                            @if ($suggest->status == config('suggest.process'))
                                                <span class="badge badge-info" id="suggest-status-{{ $suggest->id }}">{{ __('user.processing') }}</span>
                                            @elseif ($suggest->status == config('suggest.submit'))
                                                <span class="badge badge-danger" id="suggest-status-{{ $suggest->id }}">{{ __('user.submit') }}</span>
                                            @else
                                                <span class="badge badge-danger" id="suggest-status-{{ $suggest->id }}">{{ __('user.cancel') }}</span>
                                            @endif
                                        </th>
                                        <th class="column-1">
                                            @if ($suggest->status == config('suggest.process'))
                                                <button class="btn btn-info btn-edit-suggest" data-id="{{ $suggest->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger btn-cancel-suggest" data-id="{{ $suggest->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade bd-example-modal-lg" id="modal-form-edit-suggest" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
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
                    <button class="btn btn-info ml-auto btn-submit-edit-suggest">{{ __('user.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
