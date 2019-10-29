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
                                    <tr>.
                                        <th>
                                            <div class="checkbox p-0">
                                                <input id="selectable1" type="checkbox" class="checkAll" name="checkAll">
                                                <label for="selectable1"></label>
                                            </div>
                                        </th>
                                        <th>{{ __('admin.category') }}</th>
                                        <th>{{ __('admin.category_parent') }}</th>
                                        <th>{{ __('admin.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <input id="selectable2" type="checkbox">
                                                <label for="selectable2"></label>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="font-size-18">
                                            <a href="#" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                            <a href="#" class="text-gray"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
