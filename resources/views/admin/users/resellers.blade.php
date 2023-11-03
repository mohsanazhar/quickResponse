@extends('master.app')
    @section('style')
        <link href="{{asset('/master')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
     @endsection
    @section('content')
        <div id="page-wrapper" class="gray-bg">
            @include('admin.top_headers')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Resller's</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{adminUrl()}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Reseller</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>List</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                            </div>
                            <div class="ibox-content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">{{session()->get('success')}}</div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                                @endif
                                <div class="table-responsive">
                                    @include('admin.users.tables.reseller_table')
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
        <script src="{{asset('/master')}}/js/plugins/dataTables/datatables.min.js"></script>
        <script src="{{asset('/master')}}/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function(){
                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                            customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });

            });

        </script>
    @endsection