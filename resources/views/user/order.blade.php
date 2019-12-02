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
                                    <th class="column-1">{{ __('user.order_id') }}</th>
                                    <th class="column-1">{{ __('user.create_at') }}</th>
                                    <th class="column-1">{{ __('user.address') }}</th>
                                    <th class="column-1">{{ __('user.total_price') }}</th>
                                    <th class="column-1">{{ __('user.status') }}</th>
                                    <th class="column-1">{{ __('user.action') }}</th>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr class="table-row" id="">
                                        <th class="column-1">{{ $order->id }}</th>
                                        <th class="column-2">{{ $order->created_at }}</th>
                                        <th class="column-4">{{ $order->address }}</th>
                                        <th class="column-1">{{ $order->total_price }}{{ __('product.$') }}</th>
                                        <th class="column-1">
                                            @if ($order->status == config('order.processing'))
                                                <span class="badge badge-info" id="order-status-{{ $order->id }}">{{ __('user.processing') }}</span>
                                            @elseif ($order->status == config('order.cancel'))
                                                <span class="badge badge-danger" id="order-status-{{ $order->id }}">{{ __('user.cancel') }}</span>
                                            @else
                                                <span class="badge badge-success" id="order-status-{{ $order->id }}">{{ __('user.success') }}</span>
                                            @endif
                                        </th>
                                        <th class="column-1">
                                            <a href="#" class="btn-cancel-order" type="button" data-id="{{ $order->id }}">
                                                <span class="badge badge-danger">{{ __('user.cancel') }}</span>
                                            </a>
                                            <a href="{{ route('users.order_detail', ['order' => $order->id]) }}">
                                                <span class="badge badge-info">{{ __('user.detail') }}</span>
                                            </a>
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
@endsection
