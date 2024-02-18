@extends('layouts.sitemaster')
@section('title')
    تواصل معنا
@endsection

@section('content')

    <div class="content">
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <img class="logo" src="{{ asset('assets/site/img/logo.png') }}" alt="">
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
                                <label>الرسالة </label>
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
@endsection
