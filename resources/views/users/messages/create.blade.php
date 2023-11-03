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
                    <h2>Create Message</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{userUrl()}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Message</a>
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
                                <h5>Create New Message</h5>
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
                                        <form role="form" method="post" action="{{route('messages.store')}}">
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
                                                <label>Recipients</label>
                                                <select class="form-control" name="recipients" >
                                                    <option value="">Please select recipients</option>
                                                    @if(count($recipients)>0)
                                                        @foreach($recipients as $k=>$v)
                                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Template Source</label>
                                                <select class="form-control" name="template_source">
                                                    <option value="">Please select template source</option>
                                                    <option value="freeform">Free Form</option>
                                                    <option value="library">Template Library</option>
                                                    <option value="ai_assistence">AI Assisted</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="subject"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control basic-example" rows="2" name="message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Delivery Type</label>
                                                <br>
                                                <label>
                                                    <input type="radio" class=" delivery_type" name="delivery_type" onclick="deliveryType('death');" value="death"> Death
                                                </label>
                                                <label>
                                                    <input type="radio" class=" delivery_type" name="delivery_type"  onclick="deliveryType('schedule');" value="schedule"> Schedule
                                                </label>
                                            </div>
                                            <div class="form-group delivery_date d-none">
                                                <label>Date of delivery</label>
                                                <input type="date" class="form-control" name="delivery_date"/>
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
            function deliveryType(t){
                if(t=="schedule"){
                    $('.delivery_date').removeClass('d-none');
                }else{
                    $('.delivery_date').addClass('d-none');
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
        <script src="{{asset('/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            $(document).ready(function(){
                tinymce.init({
                    selector: 'textarea.basic-example',
                    height: 300,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
            });
        </script>
    @endsection
