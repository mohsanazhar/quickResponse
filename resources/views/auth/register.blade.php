<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link href="{{asset('/')}}/master/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}/master/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('/')}}/master/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('/')}}/master/css/animate.css" rel="stylesheet">
    <link href="{{asset('/')}}/master/css/style.css" rel="stylesheet">

</head>

<body class="md-skin">

<div class="middle-box loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Register to IN+</h3>
        <p>Create account to see it in action.</p>
        <div class="col-md-12 col-sm-12">
            @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">{{session()->get('error')}}</div>
            @endif
        </div>
        <form class="m-t" role="form" action="{{route('register')}}" method="post">
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
                    <input type="radio"  class="i-checks" name="user_type"  value="web" checked> End User
                </label>
                <label>
                    <input type="radio" class="i-checks" name="user_type"  value="reseller"> Reseller
                </label>
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="user_name" placeholder="Enter username" value="{{old('user_name','')}}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="Enter first name" value="{{old('first_name','')}}" class="first_name form-control" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="Enter last name" value="{{old('last_name','')}}" class="last_name form-control" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Enter name" readonly value="{{old('name','')}}" class="complete_name form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email" value="{{old('email','')}}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" class="form-control" required>
            </div>
            <div class="form-group">
                <div class="checkbox i-checks"><label> <input type="checkbox" required><i></i> Agree the terms and policy </label></div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Login</a>
        </form>
        <p class="m-t"> <small>Laravel &copy; {{date('Y')}}</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('/')}}/master/js/jquery-3.1.1.min.js"></script>
<script src="{{asset('/')}}/master/js/popper.min.js"></script>
<script src="{{asset('/')}}/master/js/bootstrap.js"></script>
<!-- iCheck -->
<script src="{{asset('/')}}/master/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
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
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/md_skin/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2023 17:41:13 GMT -->
</html>
