@extends('master.app')
    @section('style')
        <link href="{{asset('/master')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
     @endsection
    @section('content')
        <div id="page-wrapper" class="gray-bg">
            @include('admin.top_headers')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Users</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{adminUrl()}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Users</a>
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
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>User Type</th>
                                            <th>Account Type</th>
                                            <th>Email</th>
                                            <th>Status</th>{{--
                                            <th>Payments</th>--}}
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($users)>0)
                                            @foreach($users as $k=>$v)
                                                @php
                                                $accountType = $v['accountType'];

                                                @endphp
                                                <tr class="gradeX">
                                                    <td>{{$v['id']}}</td>
                                                    <td>{{$v['user_name']}}</td>
                                                    <td>{{ucwords($v['user_type'])}}</td>
                                                    <td>{{(!is_null($accountType))?$accountType['name']:''}}</td>
                                                    <td class="center">{{$v['email']}}</td>
                                                    <td class="center">{{account_status[$v['status']]}}</td>{{--
                                                    <td class="text-center">{{payment_status[$v['payment_status']]}}</td>--}}
                                                    <td class="center">{{$v['phone']}}</td>
                                                    <td class="center">{{$v['city']}}</td>
                                                    <!-- user status -->
                                                    <td class="text-center">
                                                        <a href="{{route('users.editUser',$v['id'])}}" class="btn btn-xs btn-info" title="Edit">
                                                            <i class="fa fa-edit">  </i>
                                                        </a>
                                                        @if($v['status'] == "waiting")
                                                            <a href="{{route('users.updateStatus',['type'=>'account','status'=>'active','id'=>$v['id']])}}" class="btn btn-xs btn-success" title="{{account_status['active']}}">
                                                                <i class="fa fa-check">  </i>
                                                            </a>
                                                        @endif
                                                        @if($v['status'] == "active")
                                                            <a href="{{route('users.updateStatus',['type'=>'account','status'=>'waiting','id'=>$v['id']])}}" class="btn btn-xs btn-info" title="{{account_status['waiting']}}">
                                                                <i class="fa fa-circle-o">  </i>
                                                            </a>
                                                            <a href="{{route('users.updateStatus',['type'=>'account','status'=>'deceased','id'=>$v['id']])}}" class="btn btn-xs btn-primary" title="{{account_status['deceased']}}">
                                                                <i class="fa fa-universal-access">  </i>
                                                            </a>
                                                            <a href="{{route('users.updateStatus',['type'=>'account','status'=>'cancelled','id'=>$v['id']])}}" class="btn btn-xs btn-danger" title="{{account_status['cancelled']}}">
                                                                <i class="fa fa-stop-circle">  </i>
                                                            </a>
                                                        @endif
                                                        @if($v['status'] == "cancelled")
                                                            <a href="{{route('users.updateStatus',['type'=>'account','status'=>'active','id'=>$v['id']])}}" class="btn btn-xs btn-success" title="{{account_status['active']}}">
                                                                <i class="fa fa-check">  </i>
                                                            </a>
                                                        @endif
                                                        <a href="{{route('users.delete',['id'=>$v['id']])}}" class="btn btn-xs btn-danger" title="Delete user account">
                                                            <i class="fa fa-times">  </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
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