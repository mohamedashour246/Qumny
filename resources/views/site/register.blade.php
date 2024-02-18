<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> انشاء حساب </title>
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
            <form class="form" id="registerForm">
                {{csrf_field()}}
                <div class="form-title">
                    <h2>إنشاء حساب </h2>
                    <p>هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس
                        المساحة المساحة </p>
                </div>
                <div class="form-group">
                    <label for="">أسم المستخدم</label>
                    <input class="form-control" name="name" type="text" placeholder="الرجاء إدخال أسم المستخدم" />
                </div>
                <div class="form-group">
                    <label for="">رقم الجوال</label>
                    <input class="form-control" name="phone" type="tel" placeholder="الرجاء إدخال رقم الجوال" />
                </div>
                <div class="form-group">
                    <label for="">البريد الالكترونى</label>
                    <input class="form-control" name="email" type="email" placeholder="الرجاء ادخال البريد الالكترونى" />
                </div>
                <div class="form-group">
                    <label for=""> السجل التجارى</label>
                    <input class="form-control" name="comNumber" type="number" placeholder="الرجاء ادخال  السجل التجارى" />
                </div>
                <div class="form-group">
                    <label for="">كلمة المرور</label>
                    <input class="form-control" name="password" type="password" placeholder="الرجاء إدخال كلمة المرور" /><i
                        class="left-icon fas fa-eye eye"></i>
                </div>
                <div class="form-group">
                    <label for="">تأكيد كلمة المرور</label>
                    <input class="form-control" name="confirmation_password" type="password" placeholder="الرجاء إدخال كلمة المرور" /><i
                        class="left-icon fas fa-eye eye"></i>
                </div>
                <div class="form-group">
                    <div class="cust-check">
                        <p class="checkcontainer">
                <span for="confirm">
                  بالتسجيل انت توافق علي
                  <a href="" data-toggle="modal" data-target="#exampleModal"> الشروط والاحكام </a>
                </span>
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </p>
                    </div>
                </div>
                <button class="registerBtn site-btn brown" type="submit">إنشاء حساب</button>
                <p>لديك حساب بالفعل ؟<a href="{{ route('login') }}">إضغط هنا</a></p>
            </form>
        </div>
        <img class="building" src="{{asset('assets/site/img/Group 3639.png')}} " alt="">
    </div>
</div>

<!-- modal condation -->
<div class="modal fade  custom-imodal" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الشروط والاحكام</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> </span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
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
    $('.registerBtn').on('click', function (e) {
        e.preventDefault();

        var form = $('#registerForm').get(0);
        var formData = new FormData(form);

        var oldText = $(this).text();
        $(this).prop('disabled', true).css({
            opacity:'0.5'
        }).text('جار التحميل.....');

        $.ajax({
            url: "{{ route('register.post') }}",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            success:function (data) {
                $('.registerBtn').removeAttr("disabled").css({
                    opacity: '1'
                }).text(oldText);
                if(data.key == 'success'){
                    location.assign(data.msg);
                } else {
                    Swal.fire({
                        title: data.msg,
                        position:'top',
                        timer: 3000,
                        type: 'error',
                        showCloseButton: false,
                        showConfirmButton: false,
                        animation: true
                    })
                }
            }
        });
    });
</script>
</body>

</html>
