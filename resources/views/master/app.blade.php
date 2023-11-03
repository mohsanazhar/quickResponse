<!DOCTYPE html>
<html>
<head>
    @include('master.meta')
    @include('master.style')
    <?php
    $seg2 = request()->segment(2);
    $seg3 = request()->segment(3);
    ?>
</head>

<body class="md-skin">
<div id="wrapper">
    @include('master.sidebar')
    @yield('content')
    @include('master.right_sidebar')
</div>

<!-- Mainly scripts -->
@include('master.script')
@yield('script')
@if($seg2=="")

    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.js"></script>
    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="{{asset('/master/')}}/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="{{asset('/master/')}}/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="{{asset('/master/')}}/js/demo/peity-demo.js"></script>

@endif
<!-- jQuery UI -->
<script src="{{asset('/master/')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>
@if($seg2=="")
@endif
</body>
</html>
