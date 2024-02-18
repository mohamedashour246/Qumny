@extends('layouts.sitemaster')
@section('title')
    الرئيسية
@endsection

@section('content')

    <div class="home-page">

        <div class="content">
            <div class="orders">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="banner-img">
                                <img src="{{ asset('assets/site/img/ramadan-sale-discount-banner-template-promotion_7087-1099.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="banner-img">
                                <img src="{{ asset('assets/site/img/ramadan-sale-discount-banner-template-promotion_7087-1099.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest-offers">
                <div class="container">
                    <div class="offers">
                        <div class="row">
                            <div class="title">
                                <h4 class="circle">أحدث العروض</h4>
                            </div>
                        </div>
                        <ul class="offers-block">
                            <li>
                                <img src="img/offers.jpg" alt="offers">
                                <div class="offer-details">
                                    <p>أسم العرض</p>
                                    <p>رس500</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="company-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-item one">
                                <div class="img-block">
                                    <i class="fa fa-box"></i>
                                </div>
                                <div class="info-text">
                                    <span>المنتجات</span>
                                    <span>100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection






