@extends('master.app')
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('admin.top_headers')
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                            </div>
                            <h5>Resellers</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{$resellers}}</h1>

                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Recipients</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{$recipients}}</h1>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Account Plans</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{$account_type}}</h1>

                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Account Balance</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">80,600</h1>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>

@endsection