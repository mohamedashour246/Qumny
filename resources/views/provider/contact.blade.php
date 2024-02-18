@extends('layouts.sitemaster')
@section('content')
        <div class="content">
            <div class="add-offer">
                <div class="container">
                    <div class="add-form">
                        <div class="contact-page">
                            <img class="logo" src="" alt="">
                            <form action="">
                                <div class="form-group">
                                    <label> أسم المستخدم </label>
                                    <div class="select-div">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <div class="select-div">
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الرسالى </label>
                                    <div class="select-div">
                                       <textarea name="" class="form-control" id="" cols="30" rows="4" placeholder="الرسالة"></textarea>
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="brown">ارسال </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}
    <!-- notification -->
{{--    <div class="notification-list">--}}
{{--        <div class="notification-item">--}}
{{--            <div class="not-img">--}}
{{--                <img src="{{ asset('assets/site/img/user-img.png') }}" alt="">--}}
{{--            </div>--}}
{{--            <div class="not-text text-white">--}}
{{--                <a href="#">--}}
{{--                    <p>أوامر الشبكة</p>--}}
{{--                    <span>منذ 2 د</span>--}}
{{--                    <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="notification-item">--}}
{{--            <div class="not-img">--}}
{{--                <img src="img/user-img.png" alt="">--}}
{{--            </div>--}}
{{--            <div class="not-text text-white">--}}
{{--                <a href="#">--}}
{{--                    <p>أوامر الشبكة</p>--}}
{{--                    <span>منذ 2 د</span>--}}
{{--                    <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="notification-item">--}}
{{--            <div class="not-img">--}}
{{--                <img src="img/user-img.png" alt="">--}}
{{--            </div>--}}
{{--            <div class="not-text text-white">--}}
{{--                <a href="#">--}}
{{--                    <p>أوامر الشبكة</p>--}}
{{--                    <span>منذ 2 د</span>--}}
{{--                    <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
@endsection
