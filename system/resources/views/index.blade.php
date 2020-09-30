@extends('layouts.mainLayoutMaster')
@section('title', 'Home')
@section('content')

    <main>
        <div id="hero" class="hero-area" style="background-image: url(assets/img/hero-bg-2.png);">
            <div class="container">
                <div class="row hero-right-img-purpose">
                    <div class="col-lg-7">
                        <div class="hero-content-wrap">
                            @php
                            $heading_eng = Helper::get_settings_data('first_part_title_eng');
                            $heading_ar = Helper::get_settings_data('first_part_title_arabic');
                            $head_dis_en = Helper::get_settings_data('first_part_discription_eng');
                            $head_dis_ar = Helper::get_settings_data('first_part_discription_arabic');

                            $android = Helper::get_settings_data('android_store_url');
                            $apple = Helper::get_settings_data('apple_store_url');
                            @endphp
                            <h1>@if(app()->getLocale() == 'en') {{ $heading_eng->key_value }} @else {{ $heading_ar->key_value }} @endif </h1>  

                            <p> @if(app()->getLocale() == 'en') {{ $head_dis_en->key_value }} @else {{ $head_dis_ar->key_value }} @endif </p>
                            <div class="twin-store-btn">
                                <a href="{{ $android->key_value }}"><img src="assets/img/google-play.png" alt=""></a>
                                <a href="{{ $apple->key_value }}"><img src="assets/img/apple-app-store.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-right-trans">
                            <img src="assets/img/hero-trans-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./hero-area -->

        <div class="service-area" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-120">

                            @php
                            $about_en = Helper::get_settings_data('about_eng');
                            $about_ar = Helper::get_settings_data('sbout_arabic');
                            $about_en_dis = Helper::get_settings_data('about_discription_english');
                            $about_ar_dis = Helper::get_settings_data('about_discription_arabic');
                            @endphp
                            <h2>@if(app()->getLocale() == 'en') {{ $about_en->key_value }} @else {{ $about_ar->key_value }} @endif</h2>  
                            <p>@if(app()->getLocale() == 'en') {{ $about_en_dis->key_value }} @else {{ $about_ar_dis->key_value }} @endif</p>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-4 mb-30">
                        <div class="service-type">
                            <div class="service-img">
                                <img src="{{ asset('/assets/img/s-3.png') }}" alt="">
                            </div>
                            @if(app()->getLocale() == 'ar')
                            @if(isset($settings['about_fea_one_title_ar']))
                            <h3>{{ $settings['about_fea_one_title_ar'] }}</h3>
                            @endif
                            @if(isset($settings['about_fea_one_desc_ar']))
                            <p>{!! $settings['about_fea_one_desc_ar'] !!}</p>
                            @endif
                            @else
                            @if(isset($settings['about_fea_one_title_en']))
                            <h3>{{ $settings['about_fea_one_title_en'] }}</h3>
                            @endif
                            @if(isset($settings['about_fea_one_desc_en']))
                            <p>{!! $settings['about_fea_one_desc_en'] !!}</p>
                            @endif
                            @endif
                            <!--<a href="#" class="more-service-text"><img src="assets/img/right-arrow.png" alt=""></a>-->
                        </div>
                    </div>
                    <div class="col-lg-4 mb-30">
                        <div class="service-type active">
                            <div class="service-img">
                                <img src="{{ asset('/assets/img/s-1.png') }}" alt="">
                            </div>
                            @if(app()->getLocale() == 'ar')
                            @if(isset($settings['about_fea_tow_title_ar']))
                            <h3>{{ $settings['about_fea_tow_title_ar'] }}</h3>
                            @endif
                            @if(isset($settings['about_fea_tow_desc_ar']))
                            <p>{!! $settings['about_fea_tow_desc_ar'] !!}</p>
                            @endif
                            @else
                            @if(isset($settings['about_fea_tow_title_en']))
                            <h3>{{ $settings['about_fea_tow_title_en'] }}</h3>
                            @endif
                            @if(isset($settings['about_fea_tow_desc_en']))
                            <p>{!! $settings['about_fea_tow_desc_en'] !!}</p>
                            @endif
                            @endif
                            <!--<a href="#" class="more-service-text"><img src="assets/img/right-arrow.png" alt=""></a>-->
                        </div>
                    </div>
                    <div class="col-lg-4 mb-30">
                        <div class="service-type">
                            <div class="service-img">
                                <img src="{{ asset('/assets/img/s-2.png') }}" alt="">
                            </div>
                            @if(app()->getLocale() == 'ar')
                            @if(isset($settings['about_fea_three_title_ar']))
                            <h3>{{ $settings['about_fea_three_title_ar'] }}</h3>
                            @endif
                            @if(isset($settings['about_fea_three_desc_ar']))
                            <p>{!! $settings['about_fea_three_desc_ar'] !!}</p>
                            @endif
                            @else
                            @if(isset($settings['about_fea_three_title_en']))
                            <h3>{{ $settings['about_fea_three_title_en'] }}</h3>
                            @endif
                            @if(isset($settings['about_fea_three_desc_en']))
                            <p>{!! $settings['about_fea_three_desc_en'] !!}</p>
                            @endif
                            @endif
                            <!--<a href="#" class="more-service-text"><img src="assets/img/right-arrow.png" alt=""></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./service-area -->

        <div class="register-area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 @if(app()->getLocale() == 'en') offset-lg-2 @endif">
                        <div class="register-g-wrap">
                            
                            @if(app()->getLocale() == 'en')
                            <img src="assets/img/connector-ar.png" alt="" class="connector">
                            @else
                            <img src="assets/img/connector.png" alt="" class="connector">
                            @endif
                            
                            @if(app()->getLocale() == 'en')
                            <span class="and-many-more">And many more</span>
                            @else
                            <span class="and-many-more">والـــمــــــزيــــــــــد</span>
                            @endif
                            
                            <div class="regier-flow-item bx-shadow order-2 d-flex order-md-1">
                                <div class="flow-img">
                                    <img src="assets/img/r-2.png" alt="">
                                </div>
                                @if(app()->getLocale() == 'en')
                                <p>Think in change
                                    your working style</p>
                                @else
                                <p>فــكــــر فـــي تــغــــيـــر
                                    أســلــــوب عــمــلــــك</p>
                                @endif
                            </div>
                            <div class="regier-flow-item bx-shadow order-1 d-flex d-flex order-md-2">
                                <div class="flow-img">
                                    <img src="assets/img/r-1.png" alt="">
                                </div>
                                
                                @if(app()->getLocale() == 'en')
                                <p>Pay subscriptions
                                    fees</p>
                                @else
                                <p>ســدد رســـــوم
                                    الإشــتــراك</p>
                                @endif
                            </div>
                            <div class="regier-flow-item bx-shadow order-3 d-flex d-flex order-md-3">
                                <div class="flow-img">
                                    <img src="assets/img/r-4.png" alt="">
                                </div>
                                
                                @if(app()->getLocale() == 'en')
                                <p>Talk with your
                                    secretary</p>
                                @else
                                <p>تــحــــدث مــــــع
                                    ســكــرتــاريــك الــشــخــصــــي</p>
                                @endif
                            </div>
                            <div class="regier-flow-item bx-shadow order-4 d-flex d-flex order-md-4">
                                <div class="flow-img">
                                    <img src="assets/img/r-3.png" alt="">
                                </div>
                                
                                @if(app()->getLocale() == 'en')
                                <p>Wait for 48 hours</p>
                                @else
                                <p>أنــتــظــر لــمــــدة ٤٨ ســاعــــة</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 @if(app()->getLocale() == 'en') offset-rg-2 @else offset-lg-2 @endif order-first order-rg-last">
                        <div class="section-title feture-content register-content mt-90">

                            @php
                            $reg_en = Helper::get_settings_data('reg_pro_title_en');
                            $reg_ar = Helper::get_settings_data('reg_pro_title_ar');
                            $reg_en_dis = Helper::get_settings_data('reg_pro_desc_en');
                            $reg_ar_dis = Helper::get_settings_data('reg_pro_desc_ar');
                            
                            @endphp  
                             
                           
                            <h2>@if(app()->getLocale() == 'en') {{ $reg_en->key_value }} @else {{ $reg_ar->key_value }} @endif</h2>
                            <p>@if(app()->getLocale() == 'en') {{ $reg_en_dis->key_value }} @else {{ $reg_ar_dis->key_value }} @endif</p>
                            <!--<a href="#" class="box-btn">Read More</a>-->
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- ./register-area -->


        <div class="screenshot-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title white text-center mb-80">
                            @php
                            $app_ss_en = Helper::get_settings_data('screenshot_title_en');  
                            $app_ss_ar = Helper::get_settings_data('screenshot_title_ar');
                            $app_ss_en_dis = Helper::get_settings_data('screenshot_desc_en');
                            $app_ss_ar_dis = Helper::get_settings_data('screenshot_desc_ar');
                            
                            @endphp                             

                            <h2 class="white">@if(app()->getLocale() == 'en') {{ $app_ss_en->key_value }} @else {{ $app_ss_ar->key_value }} @endif</h2>
                            <p class="white">@if(app()->getLocale() == 'en') {{ $app_ss_en_dis->key_value }} @else {{ $app_ss_ar_dis->key_value }} @endif</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container two swiper-container-coverflow  swiper-container-horizontal">
                            <img class="frem" src="assets/img/mockup.png" alt="">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide" data-swiper-slide-index="3">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3">
                                    <div class="slider-image">
                                        <img src="assets/img/sc-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="feture-area" id="feture">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-100">
                            @php
                            $features_en = Helper::get_settings_data('all_fea_title_en');  
                            $features_ar = Helper::get_settings_data('all_fea_title_ar');
                            $features_en_dis = Helper::get_settings_data('all_fea_desc_en');
                            $features_ar_dis = Helper::get_settings_data('all_fea_desc_ar');
                            
                            @endphp

                            <h2>@if(app()->getLocale() == 'en') {{ $features_en->key_value }} @else {{ $features_ar->key_value }} @endif</h2>
                            <p>@if(app()->getLocale() == 'en') {{ $features_en_dis->key_value }} @else {{ $features_ar_dis->key_value }} @endif</p>
                        </div>      
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="feature-all-content-wrap">
                            <div class="tabContainer">
                                <nav>
                                    <div class="nav nav-link-wrap" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="tbOne-tab" data-toggle="tab" href="#tbOne" role="tab" aria-controls="nav-home" aria-selected="true"><img src="assets/img/f-1.png" alt=""> {{ __('locale.Professionalism') }}</a>

                                        <a class="nav-item nav-link" id="tbTwo-tab" data-toggle="tab" href="#tbTwo" role="tab" aria-controls="nav-profile" aria-selected="false"><img src="assets/img/f-2.png" alt="">{{ __('locale.Ease of use') }}</a>

                                        <a class="nav-item nav-link" id="tbThree-tab" data-toggle="tab" href="#tbThree" role="tab" aria-controls="nav-contact" aria-selected="false"><img src="assets/img/f-3.png" alt=""> {{ __('locale.Less cost') }}</a>

                                        <a class="nav-item nav-link" id="tbFour-tab" data-toggle="tab" href="#tbFour" role="tab" aria-controls="nav-contact" aria-selected="false"><img src="assets/img/f-4.png" alt=""> {{ __('locale.Featured Clients') }}</a>

                                        <a class="nav-item nav-link" id="tbFive-tab" data-toggle="tab" href="#tbFive" role="tab" aria-controls="nav-contact" aria-selected="false"><img src="assets/img/f-5.png" alt=""> {{ __('locale.24/7 Support Service') }}</a>
                                    </div>
                                </nav>  
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="tbOne" role="tabpanel" aria-labelledby="tbOne-tab">
                                        <div class="tb-content-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="section-title feture-content">
                            @php
                            $features_en_1 = Helper::get_settings_data('fea_one_title_en');  
                            $features_ar_1 = Helper::get_settings_data('fea_one_title_ar');
                            $features_en_dis_1 = Helper::get_settings_data('fea_one_desc_en');
                            $features_ar_dis_1 = Helper::get_settings_data('fea_one_desc_ar');
                            
                            @endphp
                                                        <span class="step-no">01.</span>
                                                        <h2>@if(app()->getLocale() == 'en') {{ $features_en_1->key_value }} @else {{ $features_ar_1->key_value }} @endif</h2>
                                                        <p>@if(app()->getLocale() == 'en') {{ $features_en_dis_1->key_value }} @else {{ $features_ar_dis_1->key_value }} @endif</p>
                                                        <!--<a href="#" class="box-btn">Read More</a>-->
                                                    </div>  
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="feture-img">
                                                        <img src="assets/img/feture-img-1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tbTwo" role="tabpanel" aria-labelledby="tbTwo-tab">
                                        <div class="tb-content-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                            @php
                            $features_en_2 = Helper::get_settings_data('fea_tow_title_en');  
                            $features_ar_2 = Helper::get_settings_data('fea_tow_title_ar');
                            
                            $features_en_dis_2 = Helper::get_settings_data('fea_tow_decs_en');
                            $features_ar_dis_2 = Helper::get_settings_data('fea_tow_decs_ar');
                            
                            @endphp
                                                    <div class="section-title feture-content">
                                                        <span class="step-no">02.</span>
                                                        <h2>@if(app()->getLocale() == 'en') {{ $features_en_2->key_value }} @else {{ $features_ar_2->key_value }} @endif</h2>
                                                        <p>@if(app()->getLocale() == 'en') {{ $features_en_dis_2->key_value }} @else {{ $features_ar_dis_2->key_value }} @endif</p>
                                                        <!--<a href="#" class="box-btn">Read More</a>-->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="feture-img">
                                                        <img src="assets/img/feture-img-1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tbThree" role="tabpanel" aria-labelledby="tbThree-tab">
                                        <div class="tb-content-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                            @php
                            $features_en_3 = Helper::get_settings_data('fea_three_title_en');  
                            $features_ar_3 = Helper::get_settings_data('fea_three_title_ar');
                            $features_en_dis_3 = Helper::get_settings_data('fea_three_desc_en');
                            $features_ar_dis_3 = Helper::get_settings_data('fea_three_desc_ar');
                            
                            @endphp
                                                    <div class="section-title feture-content">
                                                        <span class="step-no">03.</span>
                                                        <h2>@if(app()->getLocale() == 'en') {{ $features_en_3->key_value }} @else {{ $features_ar_3->key_value }} @endif</h2>
                                                        <p>@if(app()->getLocale() == 'en') {{ $features_en_dis_3->key_value }} @else {{ $features_ar_dis_3->key_value }} @endif</p>
                                                        <!--<a href="#" class="box-btn">Read More</a>-->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="feture-img">
                                                        <img src="assets/img/feture-img-1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tbFour" role="tabpanel" aria-labelledby="tbFour-tab">
                                        <div class="tb-content-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                            @php
                            $features_en_4 = Helper::get_settings_data('fea_four_title_en');  
                            $features_ar_4 = Helper::get_settings_data('fea_four_title_ar');
                            $features_en_dis_4 = Helper::get_settings_data('fea_four_desc_en');
                            $features_ar_dis_4 = Helper::get_settings_data('fea_four_desc_ar');
                            
                            @endphp
                                                    <div class="section-title feture-content">
                                                        <span class="step-no">04.</span>
                                                        <h2>@if(app()->getLocale() == 'en') {{ $features_en_4->key_value }} @else {{ $features_ar_4->key_value }} @endif</h2>
                                                        <p>@if(app()->getLocale() == 'en') {{ $features_en_dis_4->key_value }} @else {{ $features_ar_dis_4->key_value }} @endif</p>
                                                        <!--<a href="#" class="box-btn">Read More</a>-->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="feture-img">
                                                        <img src="assets/img/feture-img-1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tbFive" role="tabpanel" aria-labelledby="tbFive-tab">
                                        <div class="tb-content-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                            @php
                            $features_en_5 = Helper::get_settings_data('fea_five_title_en');  
                            $features_ar_5 = Helper::get_settings_data('fea_five_title_ar');
                            $features_en_dis_5 = Helper::get_settings_data('fea_five_desc_en');
                            $features_ar_dis_5 = Helper::get_settings_data('fea_five_desc_ar');
                            
                            @endphp
                                                    <div class="section-title feture-content">
                                                        <span class="step-no">05.</span>
                                                        <h2>@if(app()->getLocale() == 'en') {{ $features_en_5->key_value }} @else {{ $features_ar_5->key_value }} @endif</h2>
                                                        <p>@if(app()->getLocale() == 'en') {{ $features_en_dis_5->key_value }} @else {{ $features_ar_dis_5->key_value }} @endif</p>
                                                        <!--<a href="#" class="box-btn">Read More</a>-->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="feture-img">
                                                        <img src="assets/img/feture-img-1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./feture-area -->

        <div class="statistics-outer-area" id="work">
            <div class="statistics-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="statistics-n-wrap bx-shadow">
                                <div class="single-statis">
                                    <div class="st-img">
                                        <img src="assets/img/a-1.png" alt="">
                                    </div>
                            @php
                            $Download_1_en = Helper::get_settings_data('fact_one_title_en');  
                            $Download_1_ar = Helper::get_settings_data('fact_one_title_ar');
                            $fact_one_num = Helper::get_settings_data('fact_one_num');
                            
                            @endphp
                                    <h4>@if(app()->getLocale() == 'en') {{ $Download_1_en->key_value }} @else {{ $Download_1_ar->key_value }} @endif</h4>
                                    <span class="st-number">{{ $fact_one_num->key_value }}</span>
                                </div>
                                <div class="single-statis">
                                    <div class="st-img">
                                        <img src="assets/img/a-2.png" alt="">
                                    </div>
                            @php
                            $Download_2_en = Helper::get_settings_data('fact_tow_title_en');  
                            $Download_2_ar = Helper::get_settings_data('fact_tow_title_ar');
                            $fact_two_num = Helper::get_settings_data('fact_two_num');
                            
                            @endphp
                                    <h4>@if(app()->getLocale() == 'en') {{ $Download_2_en->key_value }} @else {{ $Download_2_ar->key_value }} @endif</h4>
                                    <span class="st-number">{{ $fact_two_num->key_value }}</span>
                                </div>
                                <div class="single-statis">
                                    <div class="st-img">
                                        <img src="assets/img/a-3.png" alt="">
                                    </div>

                            @php
                            $Download_3_en = Helper::get_settings_data('fact_three_title_en');  
                            $Download_3_ar = Helper::get_settings_data('fact_three_title_ar');
                            $fact_three_num = Helper::get_settings_data('fact_three_num');
                            
                            @endphp
                                    <h4>@if(app()->getLocale() == 'en') {{ $Download_3_en->key_value }} @else {{ $Download_3_ar->key_value }} @endif</h4>
                                    <span class="st-number">{{ $fact_three_num->key_value }}</span>
                                </div>
                                <div class="single-statis">
                                    <div class="st-img">
                                        <img src="assets/img/a-4.png" alt="">
                                    </div>
                            @php
                            $Download_4_en = Helper::get_settings_data('fact_four_title_en');  
                            $Download_4_ar = Helper::get_settings_data('fact_four_title_ar');
                            $fact_four_num = Helper::get_settings_data('fact_four_num');
                            
                            @endphp  
                                    <h4>@if(app()->getLocale() == 'en') {{ $Download_4_en->key_value }} @else {{ $Download_4_ar->key_value }} @endif</h4>
                                    <span class="st-number">{{ $fact_four_num->key_value }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="section-title statistics-content">
                            @if(app()->getLocale() == 'ar')
                            @if(isset($settings['download_title_ar']))
                            <h2>{{ $settings['download_title_ar'] }}</h2>
                            @endif
                            @if(isset($settings['download_desc_ar']))
                            <p>{!! $settings['download_desc_ar'] !!}</p>
                            @endif
                            @else
                            @if(isset($settings['download_title_en']))
                            <h2>{{ $settings['download_title_en'] }}</h2>
                            @endif
                            @if(isset($settings['download_desc_en']))
                            <p>{!! $settings['download_desc_en'] !!}</p>
                            @endif
                            @endif
                                <div class="twin-store-btn">
                                    <a href="{{ $android->key_value }}"><img src="assets/img/google-play.png" alt=""></a>
                                    <a href="{{ $apple->key_value }}"><img src="assets/img/apple-app-store.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="double-phone">
                                <img src="assets/img/double-phone.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- ./statistics-area -->
        </div>

        <div class="testimonial-area" id="testimonial">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-100">
                            @if(app()->getLocale() == 'ar')
                            @if(isset($settings['testimonial_title_ar']))
                            <h2>{{ $settings['testimonial_title_ar'] }}</h2>
                            @endif
                            @if(isset($settings['testimonial_desc_ar']))
                            <p>{!! $settings['testimonial_desc_ar'] !!}</p>
                            @endif
                            @else
                            @if(isset($settings['testimonial_title_en']))
                            <h2>{{ $settings['testimonial_title_en'] }}</h2>
                            @endif
                            @if(isset($settings['testimonial_desc_en']))
                            <p>{!! $settings['testimonial_desc_en'] !!}</p>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider-outer-wrap">
                    <div class="row testimonial-active slider-dot-design">
                        @if(isset($testimonials) && count($testimonials) > 0)
                        @foreach($testimonials as $tes)
                        <div class="col-xl-6">
                            <div class="testimonial-item">
                                <img src="{{ asset('/assets/img/inverted-img.png') }}" alt="" class="inverted">
                                <div class="testimonial-member-des">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('/uploads/testimonials/'.$tes->img) }}" alt="">
                                    </div>
                                    <h4>{{ $tes->name }} <span class="designation">{{ $tes->job_title }}</span></h4>
                                </div>
                                <div class="testimonial-content">
                                    <p>{!! $tes->description !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="jesture-nav-wrap">
                        @if(app()->getLocale() == 'en')
                        <button class="jesture-nav nav-left"><img src="assets/img/lf-s-arrow-black.png" alt=""></button>
                        <button class="jesture-nav nav-right"><img src="assets/img/lr-s-theme-arrow.png" alt=""></button>
                        @else
                        <button class="jesture-nav nav-right"><img src="assets/img/lr-s-theme-arrow.png" alt=""></button>
                        <button class="jesture-nav nav-left"><img src="assets/img/lf-s-arrow-black.png" alt=""></button>
                        @endif
                    </div>
                </div>
            </div>
        </div> <!-- ./testimonial-area -->

        <div class="newsletter-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center mb-30">
                        <div class="newsletter-mailbox">
                            <div class="section-title mb-80">
                                @if(app()->getLocale() == 'en')
                                <h2 class="white">Subscribe to Our <br>
                                    Newsletter</h2>
                                @else
                                <h2 class="white">ســجـــل فـــي الــقــــائــمــــة <br>
                                    الأخــبــــــاريــــة</h2>
                                @endif
                            </div>
                            @if(app()->getLocale() == 'en')
                            <div class="input-inside for-newsletter">
                                <input type="text" id="newsletter">
                                <label for="newsletter">Type Your E-mail Address</label>
                                <button type="submit" class="round-btn subscribe-btn">Subscribe</button>
                            </div>
                            @else
                            <div class="input-inside for-newsletter">
                                <input type="text" id="newsletter">
                                <label for="newsletter">أدخــل بـــريــــدك الإلــكـــتــرونـــي</label>
                                <button type="submit" class="round-btn subscribe-btn">ســــجــــــل الأن</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30 d-none d-lg-block">
                        <div class="newsletter-right-img">
                            <img src="assets/img/newsletter-right-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./newsletter-area -->

@endsection
