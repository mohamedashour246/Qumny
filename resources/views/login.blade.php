<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cairo|El+Messiri|Reem+Kufi" rel="stylesheet">

    <!-- Core JS files -->
    <script type="text/javascript" src="{{URL::to('assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{URL::to('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::to('assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('assets/js/pages/login.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body class="bg-slate-800">

<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form action="{{ route('admin.login.post') }}" method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
                            <h5 class="content-group-lg">تسجيل الدخول<small class="display-block">اشعر بالحريه التامه لتسجيل الدخول في أي وقت</small></h5>
                        </div>

                        <div style="{{$errors->has('phone') ? 'border-bottom:1px solid red' : ''}}" class="form-group  has-feedback has-feedback-left">
                            <input name="phone" type="tel" class="form-control" placeholder="رقم التليفون" value="">
                            <div class="form-control-feedback">
                                <i class="icon-phone2 text-muted"></i>
                            </div>
                        </div>
                        {{--                        <p style="color: red">{{$errors->has('email') ? '*' . $errors->first('email') : ''}}</p>--}}

                        <div style="{{$errors->has('password') ? 'border-bottom:1px solid red' : ''}}" class="form-group has-feedback has-feedback-left">
                            <input name="password" type="password" class="form-control" placeholder="كلمه المرور">
                            <div  class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        {{--                        <p style="color: red">{{$errors->has('password') ? '*' . $errors->first('password') : ''}}</p>--}}

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" checked="checked">
                                        تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ Session::token() }}" />

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">تسجيل الدخول <i class="icon-circle-left2 position-right"></i></button>
                        </div>
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif

                        <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
                <!-- /advanced login -->


                <!-- Footer -->
                <div class="footer text-white">
                    <a href="#" class="text-white">جميع الحقوق محفوظه</a> | <a href="http://themeforest.net/user/Kopyov" class="text-white" target="_blank">مؤسسه أوامر الشبكه</a>  &copy; 2018.
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
