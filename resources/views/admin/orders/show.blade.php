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
                                    <th>{{ __('admin.full_name') }}</th>
                                    <th>{{ __('admin.quantity') }}</th>
                                    <th>{{ __('admin.price') }}</th>
                                    <th>{{ __('admin.address') }}</th>
                                    <th>{{ __('admin.telephone') }}</th>
                                    <th>{{ __('admin.status') }}</th>
                                    <th>{{ __('admin.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                            <div class="checkbox">
                                                <input id="selectable2" type="checkbox">
                                                <label for="selectable2"></label>
                                            </div>
                                            </td>
                                            <td>
                                            <span class="title">{{ $order->user->full_name }}</span>
                                            </td>
                                            <td>{{ $order->total_quantity }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->telephone }}</td>
                                            <td class="order-status-{{ $order->id }}">
                                                @if ($order->status  == config('order.processing'))
                                                    <span class="badge badge-info">{{ __('admin.processing') }}</span>
                                                @elseif ($order->status == config('order.cancel'))
                                                    <span class="badge badge-danger">{{ __('admin.cancel') }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ __('admin.resolved') }}</span>
                                                @endif
                                            </td>
                                            <td class="font-size-18">
                                                <form>
                                                @if ($order->status == config('order.resolved'))
                                                    <button value="{{ $order->id }}" id="btn-submit-{{ $order->id }}" class="btn btn-success btn-submit-order" disabled>
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </button>
                                                @else
                                                    <button value="{{ $order->id }}" id="btn-submit-{{ $order->id }}" class="btn btn-success btn-submit-order">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </button>
                                                @endif
                                                @if ($order->status == config('order.cancel'))
                                                    <button value="{{ $order->id }}" id="btn-cancel-{{ $order->id }}" class="btn btn-danger btn-cancel-order" disabled>
                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                    </button>
                                                @else
                                                    <button value="{{ $order->id }}" id="btn-cancel-{{ $order->id }}" class="btn btn-danger btn-cancel-order">
                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                    </button>
                                                @endif
                                            </form>
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
