@extends('master.app')
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('admin.top_headers')
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Resellers</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                @include('admin.users.tables.reseller_table')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Users</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                @include('admin.users.tables.users')
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
@endsection