<!doctype html>
<html lang="en" @if(app()->getLocale() == 'ar') dir="rtl" @endif>

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>@yield('title') | BEYOND</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">

    <!--====== Plugins css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">

    <!--====== Utilities css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/Util.css') }}">

    <!--====== Google Fonts ======-->
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">

    @if(app()->getLocale() == 'ar')
    
    <link rel="stylesheet" href="{{ asset('assets/css/main-rtl.css') }}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-rtl.css') }}">
    @else
   
    <!--====== Main css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @endif

</head>
<body>

    <div class="off-canvas-menu-wrap">
        <ul class="off-canvas-menu">
            <li class="active"><a href="/" class="scroll">{{ __('locale.Home') }}</a></li>  
            <li><a href="\#about" class="scroll">{{ __('locale.About') }}</a></li>
            <li><a href="\#feture" class="scroll">{{ __('locale.Features') }}</a></li>
            <li><a href="\#work" class="scroll">{{ __('locale.Our Work') }}</a></li>
            <li><a href="\#testimonial" class="scroll">{{ __('locale.Testimonials') }}</a></li>
            <li><a href="\#contact" class="scroll">{{ __('locale.Contact Us') }}</a></li>
            @if(app()->getLocale() == 'ar')
            <li><a href="{{ url('/lang/en') }}" class="">English</a></li>
            @else
            <li><a href="{{ url('/lang/ar') }}" style="font-family: 'Tajawal', sans-serif;" class="">العربية</a></li>
            @endif    
        </ul>
        <div class="cls-off-canvas-menu">
            <i class="fal fa-times"></i>
        </div>
    </div>
    <div class="off-canvas-overlay"></div>


    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 d-flex align-items-center">
                    <a href="\" class="logo"><img src="assets/img/logo.png" alt=""></a>
                </div>
                <div class="col-md-9 col-6 d-flex align-items-center justify-content-end">
                    <div class="toggle-bar"><i class="fal fa-bars"></i></div>
                    <ul class="main-menu d-none d-lg-flex">
                        <li class="active"><a href="#hero" class="scroll">{{ __('locale.Home') }}</a></li>
                        <li><a href="\#about" @if(!Request::segment(1) == 'terms')  class="scroll" @endif >{{ __('locale.About') }}</a></li>
                        <li><a href="\#feture" @if(!Request::segment(1) == 'terms')  class="scroll" @endif>{{ __('locale.Features') }}</a></li>
                        <li><a href="\#work" @if(!Request::segment(1) == 'terms')  class="scroll" @endif>{{ __('locale.Our Work') }}</a></li>
                        <li><a href="\#testimonial" @if(!Request::segment(1) == 'terms')  class="scroll" @endif>{{ __('locale.Testimonials') }}</a></li>  
                        <li><a href="\#contact" @if(!Request::segment(1) == 'terms')  class="scroll" @endif>{{ __('locale.Contact Us') }}</a></li>
                        @if(app()->getLocale() == 'ar')
                        <li><a href="{{ url('/lang/en') }}" class="">English</a></li>
                        @else
                        <li><a href="{{ url('/lang/ar') }}" style="font-family: 'Tajawal', sans-serif;" class="">العربية</a></li>
                        @endif
                          
                    </ul>
                </div>
            </div>
        </div>
    </header>


    @yield('content')






    @if(app()->getLocale() == 'en')
    
    <div class="contact-area" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-g-wrap">
                            <div class="contact-form">
                                <form action="#">
                                    <h3 class="tertiary-title">Let’s Contact Us</h3>
                                    <div class="input-inside">
                                        <input type="text" id="name">
                                        <label for="name">Enter your full name</label>
                                    </div>
                                    <div class="input-inside">
                                        <input type="text" id="phone">
                                        <label for="phone">Enter your phone number</label>
                                    </div>
                                    <div class="input-inside">
                                        <input type="text" id="email">
                                        <label for="email">Your E-mail address</label>
                                    </div>
                                    <div class="input-inside">
                                        <textarea name="" id="message" cols="30" rows="10"></textarea>
                                        <label for="message">Tye your message...</label>
                                    </div>
                                    <button type="submit" class="box-style">Send</button>
                                </form>
                            </div>
                            <div class="contact-address">
                                <h3 class="tertiary-title white">Let’s Contact Us</h3>
                                <ul class="address-list">
                                    <li><a href="#"><span><i class="fas fa-map-marker-alt"></i></span> @if(isset($settings['address'])) {{ $settings['address'] }} @endif</a></li>
                                    <li><a href="mailto:@if(isset($settings['email'])) {{ $settings['email'] }} @endif"><span><i class="fal fa-paper-plane"></i></span> @if(isset($settings['email'])) {{ $settings['email'] }} @endif</a></li>
                                    <li><a href="tel:@if(isset($settings['phone'])) {{ $settings['phone'] }} @endif"><span class="rotate"><i class="fa fa-phone" aria-hidden="true"></i>
                                    </span> @if(isset($settings['phone'])) {{ $settings['phone'] }} @endif </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./contact-area -->
        
    @else
    
        <div class="contact-area" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-g-wrap">
                            <div class="contact-form">
                                <form action="#">
                                    <h3 class="tertiary-title">تواصل معنا الأن</h3>
                                    <div class="input-inside">
                                        <input type="text" id="name">
                                        <label for="name">أســمــــك الــكــريــــم</label>
                                    </div>
                                    <div class="input-inside">
                                        <input type="text" id="phone">
                                        <label for="phone">رقــــم الــجــــوال</label>
                                    </div>
                                    <div class="input-inside">
                                        <input type="text" id="email">
                                        <label for="email">بـــريــــدك الإلــكــتــرونــــي</label>
                                    </div>
                                    <div class="input-inside">
                                        <textarea name="" id="message" cols="30" rows="10"></textarea>
                                        <label for="message">رســــالـــتــــك ...</label>
                                    </div>
                                    <button type="submit" class="box-style">إرســــال</button>
                                </form>
                            </div>
                            <div class="contact-address">
                                <h3 class="tertiary-title white">تواصل معنا</h3>
                                <ul class="address-list">
                                    <li><a href="#"><span><i class="fas fa-map-marker-alt"></i></span>@if(isset($settings['ar_address'])) {{ $settings['ar_address'] }} @endif </a></li>  

                                    <li><a href="mailto:@if(isset($settings['email'])) {{ $settings['email'] }} @endif"><span><i class="fal fa-paper-plane"></i></span> @if(isset($settings['email'])) {{ $settings['email'] }} @endif</a></li>

                                    <li><a href="tel:@if(isset($settings['phone'])) {{ $settings['phone'] }} @endif"><span class="rotate"><i class="fa fa-phone" aria-hidden="true"></i>
                                            </span> @if(isset($settings['phone'])) {{ $settings['phone'] }} @endif</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./contact-area -->
        
        @endif
    </main>

    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content-wrap">
                        <ul class="social-lnks">
                            <li><a @if(isset($settings['facebook_link'])) href="{{ $settings['facebook_link'] }}" @endif><i class="fab fa-facebook-f"></i></a></li>
                            <li><a @if(isset($settings['twitter_link'])) href="{{ $settings['twitter_link'] }}" @endif><i class="fab fa-twitter"></i></a></li>
                            <li><a @if(isset($settings['instagram_link'])) href="{{ $settings['instagram_link'] }}" @endif><i class="fab fa-instagram"></i></a></li>
                            <li><a @if(isset($settings['linkden_link'])) href="{{ $settings['linkden_link'] }}" @endif><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                        
                        @if(app()->getLocale() == 'en')
                        <div class="copyright-wrap">
                            <a href="/terms">Terms & Conditions</a>
                            <div style="color: #fff; font-size: 18px;">
                            	Made With 
                            	&nbsp;
                            		<i class="fa fa-heart" style="color: red;" aria-hidden="true"></i>
                            			&nbsp;
                            			By 
                            		<a href="https://devhere.co/" style="color: #1b1b1b; font-weight: 600; text-decoration: none;">
                            	Development Here</a>
                            </div>
                        </div>
                        @else
                        <div class="copyright-wrap">
                            <a href="/terms">الشروط والأحكام</a>
                            <div style="color: #fff; font-size: 18px;">
                            	صنع بــ 
                            	&nbsp;
                            		<i class="fa fa-heart" style="color: red;" aria-hidden="true"></i>
                            			&nbsp;
                            			بواسطة 
                            		<a href="https://devhere.co/" style="color: #1b1b1b; font-weight: 600; text-decoration: none;">
                            	التطوير هنا</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fal fa-angle-up"></i></a>

    <!--====== jquery js ======-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!--====== Plugins js ======-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>

    <!--====== Utilites Js =====-->
    <script src="{{ asset('assets/js/Util.js') }}"></script>
    <!--====== Main js ======-->
    @if(app()->getLocale() == 'ar') 
    <script src="{{ asset('assets/js/main-rtl.js') }}"></script>
    @else
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @endif

</body>

</html>
