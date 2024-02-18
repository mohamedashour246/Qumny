<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title> تسجيل الدخول </title>
    <link rel="shortcut icon" href="{{ asset('assets/site/img/logo.png') }} " />
    <link rel="stylesheet" href="{{ asset('assets/site/css/font-awesome-5all.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

</head>
<body class="body">
<!-- Start Loader-->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- End Loader-->
<!-- Start Body Image-->
<!-- End Body Image-->
<!-- Start Top Header-->
<header class="header"><img class="logo" src="{{asset('assets/site/img/logo.png')}} " /></header>

<!-- End Header Content-->
<!-- Start Body-->
<div class="wrapper">
    <div class="content">
        <div class="container">
            <form class="form" id="loginForm">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">رقم الجوال</label>
                    <input class="form-control" name="phone" type="tel" placeholder="الرجاء إدخال رقم الجوال"/>
                </div>
                <div class="form-group">
                    <label for="">كلمة المرور</label>
                    <input class="form-control" name="password" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
                </div><a class="forget" href="">هل نسيت كلة المرور ؟</a>
                <button class="loginBtn site-btn brown" type="submit">تسجيل الدخول</button>
                <a class="d-block text-center sign-link" href="">أنشاء حساب</a>
            </form>
        </div>
        <img class="building" src="{{ asset('assets/site/img/Group 3639.png') }} " alt="">
    </div>
</div>
<!-- End Body-->
<!-- Start Footer-->
<!-- End Footer-->
<!-- Start Fixed Footer-->
<!-- End Fixed Footer-->
<script src="{{ asset('assets/site/js/jquery-3.2.1.min.js') }} "></script>
<script src="{{ asset('assets/site/js/popper.min.js') }} "></script>
<script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/site/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script>

    $('.loginBtn').on('click', function (e) {
        e.preventDefault();

        var form = $('#loginForm').get(0);
        var formData = new FormData(form);

        var oldText = $(this).text();
        $(this).prop('disabled', true).css({
            opacity:'0.5'
        }).text('جار التحميل ...');

        $.ajax({
            url: "{{ route('site.login.post') }}",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            success:function (data) {
                $('.loginBtn').removeAttr("disabled").css({
                    opacity:'1',
                }).text(oldText);
                if(data.key == 'success'){
                    location.assign(data.msg);
                } else {
                    Swal.fire({
                        title: data.msg,
                        position:'top',
                        timer: 4000,
                        type:'error',
                        showCloseButton: false,
                        showConfirmButton:false,
                        animation: true
                    })
                }

            }
        });
    });
</script>
</body>
</html>
