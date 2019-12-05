@extends('admin.layouts.master')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Customer Overview</h5>
                                <div class="float-right">
                                    <div class="form-group">
                                        @foreach ($years as $year)
                                            <div class="radio d-inline m-r-15">
                                                <input id="{{ $year->year }}" name="chart" type="radio" value="{{ $year->year }}">
                                                <label for="{{ $year->year }}">{{ $year->year }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="m-t-10">
                                    <canvas class="chart" id="customer-overview-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
