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
                    <h2>Settings</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{adminUrl()}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Settings</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>General</strong>
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

                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-12 b-r">
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">{{session()->get('success')}}</div>
                                        @endif
                                        <form role="form" method="post" action="{{route('admin.saveSettings')}}">
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
                                                <label>Allowed account type for reseller</label>
                                                <select class="form-control" name="reseller_allowed_account_type">
                                                    <option value="">Please select account type</option>
                                                    @if(count($list)>0)
                                                        @foreach($list as $k=>$v)
                                                            <option value="{{$v['id']}}" {{(setting_item('reseller_allowed_account_type')==$v['id'])?'selected':''}}>{{$v['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
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
                function complete_name() {
                    var first = $('.first_name').val();
                    var last = $('.last_name').val();
                    var name = "";
                    if($.trim(first)!=""){
                        name = first;
                    }

                    if($.trim(last)!=""){
                        name = name+" "+last;
                    }
                    $('.complete_name').val(name);
                }
                $(document).on('keyup','.first_name',function(){
                    complete_name();
                });
                $(document).on('keyup','.last_name',function(){
                    complete_name();
                });
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
    @endsection
