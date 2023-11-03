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
                                        @if(session()->has('error'))
                                            <div class="alert alert-danger">{{session()->get('error')}}</div>
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
                                                <label onclick="changeUser('web')">
                                                    <input type="radio"  class="i-checks" name="user_type"  value="web" checked> End User
                                                </label>
                                                <label onclick="changeUser('reseller')">
                                                    <input type="radio" class="i-checks" name="user_type"  value="reseller"> Reseller
                                                </label>
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
                                            <div class="form-group">
                                                <label>Mobile Phone</label>
                                                <input type="text" name="phone" placeholder="Enter phone" value="{{old('phone','')}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Home Phone</label>
                                                <input type="text" name="home_phone" placeholder="Enter phone" value="{{old('home_phone','')}}" class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Work Phone</label>
                                                <input type="text" name="work_phone" placeholder="Enter phone" value="{{old('work_phone','')}}" class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Emergency Contact Name</label>
                                                <input type="text" name="emerg_contact_name" placeholder="Enter emergency contact name" value="{{old('emerg_contact_name','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user ">
                                                <label>Emergency Phone</label>
                                                <input type="text" name="emerg_contact" placeholder="Enter emergency phone number" value="{{old('emerg_contact','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Emergency Contact Mail</label>
                                                <input type="email" name="emerg_contact_mail" placeholder="Enter emergency contact mail" value="{{old('emerg_contact_mail','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input type="text" name="street" placeholder="Enter street" value="{{old('street','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="Enter city" value="{{old('city','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" placeholder="Enter state" value="{{old('state','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code" placeholder="Enter zip code" value="{{old('zip_code','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Employer Name</label>
                                                <input type="text" name="employer" placeholder="Enter employer"  value="{{old('employer','')}}" class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Employer Phone Number</label>
                                                <input type="text" name="employer_number" placeholder="Enter employer phone number"  value="{{old('employer_number','')}}" class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" placeholder="Select date of birth" value="{{old('dob','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user ">
                                                <label>Birth Place</label>
                                                <input type="text" name="birth_place" placeholder="Enter birth place" value="{{old('birth_place','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Social Security Number</label>
                                                <input type="text" name="ssn" placeholder="Enter social security number" value="{{old('ssn','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>High School</label>
                                                <input type="text" name="high_school" placeholder="Enter high school" value="{{old('high_school','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>College</label>
                                                <input type="text" name="college" placeholder="Enter college"value="{{old('college','')}}"   class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Facebook Address</label>
                                                <input type="text" name="fb_link" placeholder="Enter facebook address" value="{{old('fb_link','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" placeholder="Enter twitter link" value="{{old('twitter','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram Link</label>
                                                <input type="text" name="instagram" placeholder="Enter instagram link" value="{{old('instagram','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>TikTok Link</label>
                                                <input type="text" name="ticktock" placeholder="Enter tikTok username" value="{{old('ticktock','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Next Of Kin</label>
                                                <input type="text" name="kin_name" placeholder="Enter next of kin" value="{{old('kin_name','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group end_user">
                                                <label>Next Of Kin Contact Number</label>
                                                <input type="text" name="kin_contact_number" placeholder="Enter next of kin contact number" value="{{old('kin_contact_number','')}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Note</label>
                                               <textarea class="form-control" name="note" rows="2">{{old('note','')}}</textarea>
                                            </div>
                                            <div class="form-group end_user">
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
                                            <div class="form-group end_user">
                                                <label>Payment Methods</label>
                                                <br>
                                                @foreach(payment_methods_list() as $k=>$v)
                                                    <label>
                                                        <input type="checkbox" value="{{$k}}" class="i-checks" name="payment_methods[]">&nbsp; {{$v}}
                                                    </label>
                                                @endforeach
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
            function changeUser(t){
                if(t=="web"){
                    $(document).find('.end_user').removeClass('d-none');
                }
                if(t=="reseller"){
                    $(document).find('.end_user').addClass('d-none');
                }
            }
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
