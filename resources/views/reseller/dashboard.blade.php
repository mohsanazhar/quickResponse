@extends('reseller.layout.app')
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('reseller.layout.top_headers')
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                            </div>
                            <h5>End Users</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{$users}}</h1>

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
                            <h1 class="no-margins">{{$balance->balance}}</h1>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>

@endsection