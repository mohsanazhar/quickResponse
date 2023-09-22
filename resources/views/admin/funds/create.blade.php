@extends('master.app')
@section('style')
    <link href="{{asset('/master')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('/master')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
@endsection
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('admin.top_headers')
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Funds</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{resellerUrl()}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Funds</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Add Fund</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Add New Funds</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12 b-r">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">{{session()->get('success')}}</div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">{{session()->get('error')}}</div>
                                    @endif
                                    <form role="form" method="post" action="{{route('admin.funds.store')}}">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="bold">Payment Methods</label>
                                            <br>
                                            @if(count(payment_methods_list())>0)
                                                @php
                                                $methods_list = payment_methods_list();
                                                @endphp
                                                @foreach($methods_list as $k=>$v)
                                            <label>
                                                <input type="radio" value="{{$k}}" class="i-checks" name="payment_method">&nbsp; {{$v}}
                                            </label>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>User</label>
                                            <select class="form-control" name="user_id">
                                                <option value="">Please select user</option>
                                                @if(count($reseller)>0)
                                                    @foreach($reseller as $k=>$v)
                                                        <option value="{{$v['id']}}">{{$v['user_name']}} ({{$v['name']}})</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" class="form-control" name="amount" value="{{old('amount',0)}}"/>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')

    </div>
@endsection
@section('script')
    <!-- Custom and plugin javascript -->
    <script src="{{asset('/master')}}/js/inspinia.js"></script>
    <script src="{{asset('/master')}}/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="{{asset('/master')}}/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
