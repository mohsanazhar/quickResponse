@extends('master.app')
    @section('style')
        <link href="{{asset('/master')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="{{asset('/master')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    @endsection
    @section('content')
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.9.4/md_skin/search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a7.html">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a4.html">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/profile.html">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{adminUrl()}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Users</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add New</strong>
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
                                <h5>Create New User</h5>
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
                                        <form role="form" method="post" action="{{route('users.saveNewUser')}}">
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
                                                <label>User Type</label>
                                                <br>
                                                <label>
                                                    <input type="radio"  class="i-checks" name="user_type" value="web" checked> End User
                                                </label>
                                                <label>
                                                    <input type="radio" class="i-checks" name="user_type" value="reseller"> Reseller
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" name="user_name" placeholder="Enter username" value="{{old('user_name','')}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" placeholder="Enter first name" value="{{old('first_name','')}}" class="first_name form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" placeholder="Enter last name" value="{{old('last_name','')}}" class="last_name form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" placeholder="Enter name" readonly value="{{old('name','')}}" class="complete_name form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Enter email" value="{{old('email','')}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Enter password" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Phone</label>
                                                <input type="text" name="phone" placeholder="Enter phone" value="{{old('phone','')}}" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Home Phone</label>
                                                <input type="text" name="home_phone" placeholder="Enter phone" value="{{old('home_phone','')}}" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Work Phone</label>
                                                <input type="text" name="work_phone" placeholder="Enter phone" value="{{old('work_phone','')}}" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Emergency Phone</label>
                                                <input type="text" name="emerg_contact" placeholder="Enter emergency contact" value="{{old('emerg_contact','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Street</label>
                                                <input type="text" name="street" placeholder="Enter street" value="{{old('street','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="Enter city" value="{{old('city','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>State</label>
                                                <input type="text" name="state" placeholder="Enter state" value="{{old('state','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code" placeholder="Enter zip code" value="{{old('zip_code','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Employer</label>
                                                <input type="text" name="employer" placeholder="Enter employer"  value="{{old('employer','')}}" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" placeholder="Select date of birth" value="{{old('dob','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Birth Place</label>
                                                <input type="text" name="birth_place" placeholder="Enter birth place" value="{{old('birth_place','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Social Security Number</label>
                                                <input type="text" name="ssn" placeholder="Enter social security number" value="{{old('ssn','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Employer</label>
                                                <input type="text" name="employer" placeholder="Enter employer" value="{{old('"employer','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>High School</label>
                                                <input type="text" name="high_school" placeholder="Enter high school" value="{{old('high_school','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>College</label>
                                                <input type="text" name="college" placeholder="Enter college"value="{{old('college','')}}"   class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Facebook Address</label>
                                                <input type="text" name="fb_link" placeholder="Enter facebook address" value="{{old('fb_link','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" placeholder="Enter twitter link" value="{{old('twitter','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Instagram Link</label>
                                                <input type="text" name="instagram" placeholder="Enter instagram link" value="{{old('instagram','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>TikTok Link</label>
                                                <input type="text" name="ticktock" placeholder="Enter tikTok username" value="{{old('ticktock','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Kin Name</label>
                                                <input type="text" name="kin_name" placeholder="Enter kin name" value="{{old('kin_name','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Note</label>
                                               <textarea class="form-control" name="note" rows="2">{{old('note','')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Type</label>
                                                <select class="form-control" name="account_type">
                                                    <option value="">Please select account type</option>
                                                    @if(count($accountType)>0)
                                                        @foreach($accountType as $k=>$v)
                                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Payment Methods</label>
                                                <br>
                                                <label>
                                                    <input type="checkbox" value="paypal" class="i-checks" name="payment_methods[]">&nbsp; PayPal
                                                </label>
                                                <label>
                                                    <input type="checkbox" value="stripe" class="i-checks" name="payment_methods[]">&nbsp; Stripe
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
