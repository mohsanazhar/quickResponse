@extends('reseller.layout.app')
    @section('style')
        <link href="{{asset('/master')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="{{asset('/master')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    @endsection
    @section('content')
        <div id="page-wrapper" class="gray-bg">
            @include('reseller.layout.top_headers')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{resellerUrl()}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Users</a>
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
                                <h5>Update User</h5>
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
                                        <form role="form" method="post" action="{{route('users.update',$user['id'])}}">
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
                                                <label>User Name</label>
                                                <input type="text" name="user_name" placeholder="Enter username" value="{{old('user_name',$user['user_name'])}}" class="form-control">
                                            </div>
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
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Enter password" class="form-control">
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
                                                <label>Emergency Phone</label>
                                                <input type="text" name="emerg_contact" placeholder="Enter emergency contact" value="{{old('emerg_contact',$user['emerg_contact'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Street</label>
                                                <input type="text" name="street" placeholder="Enter street" value="{{old('street',$user['street'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="Enter city" value="{{old('city',$user['city'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>State</label>
                                                <input type="text" name="state" placeholder="Enter state" value="{{old('state',$user['state'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code" placeholder="Enter zip code" value="{{old('zip_code',$user['zip_code'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Employer</label>
                                                <input type="text" name="employer" placeholder="Enter employer"  value="{{old('employer',$user['employer'])}}" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" placeholder="Select date of birth" value="{{old('dob',$user['dob'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Birth Place</label>
                                                <input type="text" name="birth_place" placeholder="Enter birth place" value="{{old('birth_place',$user['birth_place'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Social Security Number</label>
                                                <input type="text" name="ssn" placeholder="Enter social security number" value="{{old('ssn',$user['ssn'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Employer</label>
                                                <input type="text" name="employer" placeholder="Enter employer" value="{{old('"employer',$user['employer'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>High School</label>
                                                <input type="text" name="high_school" placeholder="Enter high school" value="{{old('high_school',$user['high_school'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>College</label>
                                                <input type="text" name="college" placeholder="Enter college"value="{{old('college',$user['college'])}}"   class="form-control">
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
                                                <label>Kin Name</label>
                                                <input type="text" name="kin_name" placeholder="Enter kin name" value="{{old('kin_name',$user['kin_name'])}}"  class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>Note</label>
                                               <textarea class="form-control" name="note" rows="2">{{old('note',$user['note'])}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Type</label>
                                                <select class="form-control" name="account_type">
                                                    <option value="">Please select account type</option>
                                                    @if(count($account)>0)
                                                        @foreach($account as $k=>$v)
                                                            <option value="{{$v['id']}}" {{($user['account_type']==$v['id'])?'selected':''}}>{{$v['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @php $user['payment_methods'] = (!is_null($user['payment_methods']))?$user['payment_methods']:(array)$user['payment_methods'];  @endphp
                                            <div class="form-group">
                                                <label>Payment Methods</label>
                                                <br>
                                                <label>
                                                    <input type="checkbox" value="paypal" class="i-checks" name="payment_methods[]" {{(in_array('paypal',$user['payment_methods']))?'checked':''}}>&nbsp; PayPal
                                                </label>
                                                <label>
                                                    <input type="checkbox" value="stripe" class="i-checks" name="payment_methods[]" {{(in_array('stripe',$user['payment_methods']))?'checked':''}}>&nbsp; Stripe
                                                </label>
                                            </div>
                                            {{--<div class="form-group">
                                                <label>Status</label>
                                                <br>
                                                <label>
                                                    <input type="checkbox" value="active" class="i-checks" name="status" {{($user['status']==1)?'checked':''}}>&nbsp; Active
                                                </label>
                                            </div>--}}
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
