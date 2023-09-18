
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/md_skin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2023 17:39:20 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{asset('/')}}/public/master/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}/public/master/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('/')}}/public/master/css/animate.css" rel="stylesheet">
    <link href="{{asset('/')}}/public/master/css/style.css" rel="stylesheet">

</head>

<body class="md-skin">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Welcome to IN+</h3>
        </p>
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" action="{{ route('login') }}" method="post">
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
                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="">Create an account</a>
        </form>
        <p class="m-t"> <small>Developed &copy; 2023</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('/')}}/public/master/js/jquery-3.1.1.min.js"></script>
<script src="{{asset('/')}}/public/master/js/popper.min.js"></script>
<script src="{{asset('/')}}/public/master/js/bootstrap.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/md_skin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2023 17:39:20 GMT -->
</html>

