@extends('users.layout.app')
@section('style')
    <link href="{{asset('/master')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('/master')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
@endsection
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('users.layout.top_headers')
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Edit Recipients</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{userUrl()}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Recipients</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Update</strong>
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
                            <h5>Update Recipient</h5>
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
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">{{session()->get('success')}}</div>
                                    @endif
                                    <form role="form" method="post" action="{{route('recipients.update',$user['id'])}}">
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
                                            <label>First Name</label>
                                            <input type="text" name="first_name" placeholder="Enter first name" value="{{old('first_name',$user['first_name'])}}" class="first_name form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" placeholder="Enter last name" value="{{old('last_name',$user['last_name'])}}" class="last_name form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Enter name" readonly value="{{old('name',$user['name'])}}" class="complete_name form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Enter email" value="{{old('email',$user['email'])}}" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Phone</label>
                                            <input type="text" name="phone" placeholder="Enter phone" value="{{old('phone',$user['phone'])}}" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Home Phone</label>
                                            <input type="text" name="home_phone" placeholder="Enter phone" value="{{old('home_phone',$user['home_phone'])}}" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Work Phone</label>
                                            <input type="text" name="work_phone" placeholder="Enter phone" value="{{old('work_phone',$user['work_phone'])}}" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Employer</label>
                                            <input type="text" name="employer" placeholder="Enter employer"  value="{{old('employer',$user['employer'])}}" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Facebook Address</label>
                                            <input type="text" name="fb_link" placeholder="Enter facebook address" value="{{old('fb_link',$user['fb_link'])}}"  class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" placeholder="Enter twitter link" value="{{old('twitter',$user['twitter'])}}"  class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Instagram Link</label>
                                            <input type="text" name="instagram" placeholder="Enter instagram link" value="{{old('instagram',$user['instagram'])}}"  class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>TikTok Link</label>
                                            <input type="text" name="ticktock" placeholder="Enter tikTok username" value="{{old('ticktock',$user['ticktock'])}}"  class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>
                                                <input type="checkbox" name="status" {{($user['status']==1)?'checked':''}}   class="i-checks"> Active
                                            </label>
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
