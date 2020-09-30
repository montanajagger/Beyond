{{-- layout --}} @extends('layouts.contentLayoutMaster') {{-- page title --}} @section('title','Users edit') {{-- vendor styles --}} @section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}" />
@endsection {{-- page style --}} @section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}" />
<style>
    .tabs .tab a{
        font-size: 12px;
        padding: 0px 12px;
    }
</style>
@endsection {{-- page content --}} @section('content')
<!-- users edit start -->
<div class="section users-edit">
    <div class="card">
        <div class="card-content">  
            <h5>{{ __('locale.Home Page') }}</h5>

            <div class="divider mb-3"></div>
            <div class="row">
                <div class="col s12" id="account">
                    <form id="accountForm" action="{{ url('home_page_settings') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col s12 m12 l12">
                                
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="row" id="main-view" >
                                                    <div class="col s12">  
                                                        <ul class="tabs tab-demo z-depth-1" style="padding-bottom: 65px;">

                                                            {{-- <li class="tab"><a class="active" href="#test1">{{ __('locale.Main Menu') }}</a></li> --}}

                                                            <li class="tab "><a class="active" href="#test2" class="">{{ __('locale.Title And Description') }}</a></li>

                                                            <li class="tab"><a href="#test3" class="">{{ __('locale.Store Url') }}</a></li>

                                                            <li class="tab"><a href="#test4" class="">{{ __('locale.About Beyond') }}</a></li>
                                                            
                                                            <li class="tab"><a href="#features" class="">{{ __('locale.Features') }}</a></li>

                                                            <li class="tab"><a href="#register" class="">{{ __('locale.Register Process') }}</a></li>
                                                            <li class="tab"><a href="#screenshot" class="">{{ __('locale.Screenshot') }}</a></li>
                                                            <li class="tab"><a href="#Features2" class="">{{ __('locale.All Features') }}</a></li>
                                                            <li class="tab"><a href="#Facts" class="">{{ __('locale.Facts') }}</a></li>
                                                            <li class="tab"><a href="#Download" class="">{{ __('locale.Download') }}</a></li>
                                                            {{-- <li class="tab"><a href="#Facts" class="">{{ __('locale.Facts') }}</a></li> --}}
                                                            <li class="tab"><a href="#Testimonials" class="">{{ __('locale.Testimonials') }}</a></li>
                                                            <li class="tab"><a href="#address_social_links" class="">{{ __('locale.Address & Social Links') }}</a></li>
                                                            <li class="tab"><a href="#application_home_text" class="">{{ __('locale.application_home_screen_text') }}</a></li>
                                                            <li class="indicator"></li>  
                                                        </ul>
                                                    </div>
                                                    <div class="col s12">

                                                        {{-- <div id="test1" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                Oat cake oat cake marzipan macaroon fruitcake. Ice cream gummi bears ice cream ice cream danish jelly beans caramels tootsie roll. Pie macaroon croissant tart cake jelly beans
                                                                fruitcake.
                                                            </p>
                                                        </div> --}}

                                                        <div id="test2" class="col s12" style="display: none;">
                                                            <p class="mt-2 mb-2">
                                                              
                                                              <input type="text" name="first_part_title_eng" value="@if(!is_null($settings->where('key_name', 'first_part_title_eng')->first())){{ old('first_part_title_eng') ?? $settings->where('key_name', 'first_part_title_eng')->first()->key_value  }}@endif" placeholder="Title In Englisg" >
                                                            
                                                            <label for="first_part_title_eng">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text"  class="form-control px-1"  name="first_part_title_arabic" value="@if(!is_null($settings->where('key_name', 'first_part_title_arabic')->first())){{ old('first_part_title_arabic') ?? $settings->where('key_name', 'first_part_title_arabic')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="first_part_title_arabic">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="first_part_discription_eng" id="profile_discription" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'first_part_discription_eng')->first())){{ old('first_part_discription_eng') ?? $settings->where('key_name', 'first_part_discription_eng')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="first_part_discription_eng">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="first_part_discription_arabic" id="profile_discription" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'first_part_discription_arabic')->first())){{ old('first_part_discription_arabic') ?? $settings->where('key_name', 'first_part_discription_arabic')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="first_part_discription_arabic">{{ __('locale.Description In Arabic') }}</label>

                                                            
                                                            </p>


                                                        </div>  

                                                        <div id="test3" class="col s12" style="display: none;">
                                                            <p class="mt-2 mb-2">
                                                                <input type="text" name="apple_store_url" value="@if(!is_null($settings->where('key_name', 'apple_store_url')->first())){{ old('apple_store_url') ?? $settings->where('key_name', 'apple_store_url')->first()->key_value  }}@endif" placeholder="Apple Store Url" >  
                                                            
                                                            <label for="Username">{{ __('locale.Apple Store Url') }}</label>


                                                            <input type="text" name="android_store_url" value="@if(!is_null($settings->where('key_name', 'android_store_url')->first())){{ old('android_store_url') ?? $settings->where('key_name', 'android_store_url')->first()->key_value  }}@endif" placeholder="Android Store Url" >  
                                                            
                                                            <label for="Username">{{ __('locale.Android Store Url') }}</label>



                                                            </p>  
                                                        </div>

                                                        <div id="test4" class="col s12 " style="display: none;">
                                                            <p class="mt-2 mb-2">
                                                                
                                                            <input type="text" name="about_eng" value="@if(!is_null($settings->where('key_name', 'about_eng')->first())){{ old('about_eng') ?? $settings->where('key_name', 'about_eng')->first()->key_value  }}@endif" placeholder="Title In Englisg" >
                                                            
                                                            <label for="Username">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="sbout_arabic" value="@if(!is_null($settings->where('key_name', 'sbout_arabic')->first())){{ old('sbout_arabic') ?? $settings->where('key_name', 'sbout_arabic')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="Username">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="about_discription_english" id="profile_discription" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_discription_english')->first())){{ old('about_discription_english') ?? $settings->where('key_name', 'about_discription_english')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="about_discription_arabic" id="profile_discription" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_discription_arabic')->first())){{ old('about_discription_arabic') ?? $settings->where('key_name', 'about_discription_arabic')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.Description In Arabic') }}</label>


                                                            </p>  
                                                        </div>
                                                        {{-- features --}}
                                                        <div id="features" class="col s12" style="display: block;">
                                                             <p class="mt-2 mb-2">
                                                                <input type="text" name="about_fea_one_title_en" value="@if(!is_null($settings->where('key_name', 'about_fea_one_title_en')->first())){{ old('about_fea_one_title_en') ?? $settings->where('key_name', 'about_fea_one_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.About Feature One Title in English') }}" >
                                                            
                                                            <label for="about_fea_one_title_en">{{ __('locale.About Feature One Title in English') }}</label>  
  

                                                            <input type="text" name="about_fea_one_title_ar" value="@if(!is_null($settings->where('key_name', 'about_fea_one_title_ar')->first())){{ old('about_fea_one_title_ar') ?? $settings->where('key_name', 'about_fea_one_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.About Feature One Title in Arabic') }}" >  
                                                            <label for="about_fea_one_title_ar">{{ __('locale.About Feature One Title in Arabic') }}</label>

                                                            <textarea name="about_fea_one_desc_en" id="about_fea_one_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_fea_one_desc_en')->first())){{ old('about_fea_one_desc_en') ?? $settings->where('key_name', 'about_fea_one_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="about_fea_one_desc_en">{{ __('locale.About Feature One Description in English') }}</label>  

                                                            <textarea name="about_fea_one_desc_ar" id="about_fea_one_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_fea_one_desc_ar')->first())){{ old('about_fea_one_desc_ar') ?? $settings->where('key_name', 'about_fea_one_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.About Feature One Description in Arabic') }}</label> 
                                                            <hr style="border: 3px solid;">

                                                            <input type="text" name="about_fea_tow_title_en" value="@if(!is_null($settings->where('key_name', 'about_fea_tow_title_en')->first())){{ old('about_fea_tow_title_en') ?? $settings->where('key_name', 'about_fea_tow_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.About Feature Two Title in English') }}" >
                                                            
                                                            <label for="about_fea_tow_title_en">{{ __('locale.About Feature Two Title in English') }}</label>  
  

                                                            <input type="text" name="about_fea_tow_title_ar" value="@if(!is_null($settings->where('key_name', 'about_fea_tow_title_ar')->first())){{ old('about_fea_tow_title_ar') ?? $settings->where('key_name', 'about_fea_tow_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.About Feature Two Title in Arabic') }}" >  
                                                            <label for="about_fea_tow_title_ar">{{ __('locale.About Feature Two Title in Arabic') }}</label>

                                                            <textarea name="about_fea_tow_desc_en" id="about_fea_tow_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_fea_tow_desc_en')->first())){{ old('about_fea_tow_desc_en') ?? $settings->where('key_name', 'about_fea_tow_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="about_fea_tow_desc_en">{{ __('locale.About Feature Tow Description in English') }}</label>  

                                                            <textarea name="about_fea_tow_desc_ar" id="about_fea_tow_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_fea_tow_desc_ar')->first())){{ old('about_fea_tow_desc_ar') ?? $settings->where('key_name', 'about_fea_tow_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.About Feature Tow Description in Arabic') }}</label> 
                                                            <hr style="border: 3px solid;">

                                                            <input type="text" name="about_fea_three_title_en" value="@if(!is_null($settings->where('key_name', 'about_fea_three_title_en')->first())){{ old('about_fea_three_title_en') ?? $settings->where('key_name', 'about_fea_three_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.About Feature Three Title in English') }}" >
                                                            
                                                            <label for="about_fea_three_title_en">{{ __('locale.About Feature Three Title in English') }}</label>  
  

                                                            <input type="text" name="about_fea_three_title_ar" value="@if(!is_null($settings->where('key_name', 'about_fea_three_title_ar')->first())){{ old('about_fea_three_title_ar') ?? $settings->where('key_name', 'about_fea_three_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.About Feature Two Title in Arabic') }}" >  
                                                            <label for="about_fea_three_title_ar">{{ __('locale.About Feature Three Title in Arabic') }}</label>

                                                            <textarea name="about_fea_three_desc_en" id="about_fea_three_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_fea_three_desc_en')->first())){{ old('about_fea_three_desc_en') ?? $settings->where('key_name', 'about_fea_three_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="about_fea_three_desc_en">{{ __('locale.About Feature Three Description in English') }}</label>  

                                                            <textarea name="about_fea_three_desc_ar" id="about_fea_three_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'about_fea_three_desc_ar')->first())){{ old('about_fea_three_desc_ar') ?? $settings->where('key_name', 'about_fea_three_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.About Feature Three Description in Arabic') }}</label>

                                                            </p>
                                                        </div>


														<div id="register" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                <input type="text" name="reg_pro_title_en" value="@if(!is_null($settings->where('key_name', 'reg_pro_title_en')->first())){{ old('reg_pro_title_en') ?? $settings->where('key_name', 'reg_pro_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="reg_pro_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="reg_pro_title_ar" value="@if(!is_null($settings->where('key_name', 'reg_pro_title_ar')->first())){{ old('reg_pro_title_ar') ?? $settings->where('key_name', 'reg_pro_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="reg_pro_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="reg_pro_desc_en" id="reg_pro_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'reg_pro_desc_en')->first())){{ old('reg_pro_desc_en') ?? $settings->where('key_name', 'reg_pro_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="reg_pro_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="reg_pro_desc_ar" id="reg_pro_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'reg_pro_desc_ar')->first())){{ old('reg_pro_desc_ar') ?? $settings->where('key_name', 'reg_pro_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.Description In Arabic') }}</label> 
                                                            </p>
                                                        </div>

                                                        <div id="screenshot" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                <input type="text" name="screenshot_title_en" value="@if(!is_null($settings->where('key_name', 'screenshot_title_en')->first())){{ old('screenshot_title_en') ?? $settings->where('key_name', 'screenshot_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="screenshot_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="screenshot_title_ar" value="@if(!is_null($settings->where('key_name', 'screenshot_title_ar')->first())){{ old('screenshot_title_ar') ?? $settings->where('key_name', 'screenshot_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="screenshot_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="screenshot_desc_en" id="screenshot_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'screenshot_desc_en')->first())){{ old('screenshot_desc_en') ?? $settings->where('key_name', 'screenshot_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="screenshot_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="screenshot_desc_ar" id="screenshot_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'screenshot_desc_ar')->first())){{ old('screenshot_desc_ar') ?? $settings->where('key_name', 'screenshot_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="Username">{{ __('locale.Description In Arabic') }}</label> 
                                                            </p>
                                                        </div>

                                                        <div id="Features2" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                               <input type="text" name="all_fea_title_en" value="@if(!is_null($settings->where('key_name', 'all_fea_title_en')->first())){{ old('all_fea_title_en') ?? $settings->where('key_name', 'all_fea_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="all_fea_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="all_fea_title_ar" value="@if(!is_null($settings->where('key_name', 'all_fea_title_ar')->first())){{ old('all_fea_title_ar') ?? $settings->where('key_name', 'all_fea_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="all_fea_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="all_fea_desc_en" id="all_fea_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'all_fea_desc_en')->first())){{ old('all_fea_desc_en') ?? $settings->where('key_name', 'all_fea_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="all_fea_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="all_fea_desc_ar" id="all_fea_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'all_fea_desc_ar')->first())){{ old('all_fea_desc_ar') ?? $settings->where('key_name', 'all_fea_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="all_fea_desc_ar">{{ __('locale.Description In Arabic') }}</label>   

                                                            <div class="col s12">  
                                                        <ul class="tabs tab-demo z-depth-1">

                                                            <li class="tab"><a class="active" href="#Feature_one">{{ __('locale.Feature One') }}</a></li>
                                                            <li class="tab"><a class="active" href="#Feature_tow">{{ __('locale.Feature Tow') }}</a></li>
                                                            <li class="tab"><a class="active" href="#Feature_three">{{ __('locale.Feature Three') }}</a></li>
                                                            <li class="tab"><a class="active" href="#Feature_four">{{ __('locale.Feature Four') }}</a></li>
                                                            <li class="tab"><a class="active" href="#Feature_five">{{ __('locale.Feature Five') }}</a></li>

                                                            <li class="indicator"></li>  
                                                        </ul>
                                                    </div>
                                                    <div class="col s12">
                                                         <div id="Feature_one" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="fea_one_title_en" value="@if(!is_null($settings->where('key_name', 'fea_one_title_en')->first())){{ old('fea_one_title_en') ?? $settings->where('key_name', 'fea_one_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="fea_one_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="fea_one_title_ar" value="@if(!is_null($settings->where('key_name', 'fea_one_title_ar')->first())){{ old('fea_one_title_ar') ?? $settings->where('key_name', 'fea_one_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="fea_one_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="fea_one_desc_en" id="fea_one_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_one_desc_en')->first())){{ old('fea_one_desc_en') ?? $settings->where('key_name', 'fea_one_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_one_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="fea_one_desc_ar" id="fea_one_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_one_desc_ar')->first())){{ old('fea_one_desc_ar') ?? $settings->where('key_name', 'fea_one_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_one_desc_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>
                                                        <div id="Feature_tow" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="fea_tow_title_en" value="@if(!is_null($settings->where('key_name', 'fea_tow_title_en')->first())){{ old('fea_tow_title_en') ?? $settings->where('key_name', 'fea_tow_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="fea_tow_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="fea_tow_title_ar" value="@if(!is_null($settings->where('key_name', 'fea_tow_title_ar')->first())){{ old('fea_tow_title_ar') ?? $settings->where('key_name', 'fea_tow_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="fea_tow_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="fea_tow_decs_en" id="fea_tow_decs_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_tow_decs_en')->first())){{ old('fea_tow_decs_en') ?? $settings->where('key_name', 'fea_tow_decs_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_tow_decs_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="fea_tow_decs_ar" id="fea_tow_decs_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_tow_decs_ar')->first())){{ old('fea_tow_decs_ar') ?? $settings->where('key_name', 'fea_tow_decs_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_tow_decs_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>
                                                        <div id="Feature_three" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="fea_three_title_en" value="@if(!is_null($settings->where('key_name', 'fea_three_title_en')->first())){{ old('fea_three_title_en') ?? $settings->where('key_name', 'fea_three_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="fea_three_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="fea_three_title_ar" value="@if(!is_null($settings->where('key_name', 'fea_three_title_ar')->first())){{ old('fea_three_title_ar') ?? $settings->where('key_name', 'fea_three_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="fea_three_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="fea_three_desc_en" id="fea_three_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_three_desc_en')->first())){{ old('fea_three_desc_en') ?? $settings->where('key_name', 'fea_three_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_three_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="fea_three_desc_ar" id="fea_three_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_three_desc_ar')->first())){{ old('fea_three_desc_ar') ?? $settings->where('key_name', 'fea_three_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_three_desc_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>
                                                        <div id="Feature_four" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="fea_four_title_en" value="@if(!is_null($settings->where('key_name', 'fea_four_title_en')->first())){{ old('fea_four_title_en') ?? $settings->where('key_name', 'fea_four_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="fea_four_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="fea_four_title_ar" value="@if(!is_null($settings->where('key_name', 'fea_four_title_ar')->first())){{ old('fea_four_title_ar') ?? $settings->where('key_name', 'fea_four_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="fea_four_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="fea_four_desc_en" id="fea_four_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_four_desc_en')->first())){{ old('fea_four_desc_en') ?? $settings->where('key_name', 'fea_four_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_four_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="fea_four_desc_ar" id="fea_four_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_four_desc_ar')->first())){{ old('fea_four_desc_ar') ?? $settings->where('key_name', 'fea_four_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_four_desc_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>
                                                        <div id="Feature_five" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="fea_five_title_en" value="@if(!is_null($settings->where('key_name', 'fea_five_title_en')->first())){{ old('fea_five_title_en') ?? $settings->where('key_name', 'fea_five_title_en')->first()->key_value  }}@endif" placeholder="Title In English" >
                                                            
                                                            <label for="fea_five_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="fea_five_title_ar" value="@if(!is_null($settings->where('key_name', 'fea_five_title_ar')->first())){{ old('fea_five_title_ar') ?? $settings->where('key_name', 'fea_five_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="fea_five_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="fea_five_desc_en" id="fea_five_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_five_desc_en')->first())){{ old('fea_five_desc_en') ?? $settings->where('key_name', 'fea_five_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_five_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="fea_five_desc_ar" id="fea_five_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'fea_five_desc_ar')->first())){{ old('fea_five_desc_ar') ?? $settings->where('key_name', 'fea_five_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="fea_five_desc_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>
                                                    </div>

                                                            </p>
                                                        </div>

                                                        <div id="Facts" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                 <input type="text" name="fact_one_title_en" value="@if(!is_null($settings->where('key_name', 'fact_one_title_en')->first())){{ old('fact_one_title_en') ?? $settings->where('key_name', 'fact_one_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact One Title In English') }}" >
                                                            
                                                            <label for="fact_one_title_en">{{ __('locale.Fact One Title In English') }}</label> 
                                                            <input type="text" name="fact_one_title_ar" value="@if(!is_null($settings->where('key_name', 'fact_one_title_ar')->first())){{ old('fact_one_title_ar') ?? $settings->where('key_name', 'fact_one_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact One Title In Arabic') }}" >  
                                                            <label for="fact_one_title_ar">{{ __('locale.Fact One Title In Arabic') }}</label>
                                                            <input type="text" name="fact_one_num" value="@if(!is_null($settings->where('key_name', 'fact_one_num')->first())){{ old('fact_one_num') ?? $settings->where('key_name', 'fact_one_num')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact One Number') }}" >  
                                                            <label for="fact_one_num">{{ __('locale.Fact One Number') }}</label>
                                                              {{-- fact 2 --}}

                                                              <input type="text" name="fact_tow_title_en" value="@if(!is_null($settings->where('key_name', 'fact_tow_title_en')->first())){{ old('fact_tow_title_en') ?? $settings->where('key_name', 'fact_tow_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Tow Title In English') }}" >
                                                            
                                                            <label for="fact_tow_title_en">{{ __('locale.Fact Tow Title In English') }}</label> 
                                                            <input type="text" name="fact_tow_title_ar" value="@if(!is_null($settings->where('key_name', 'fact_tow_title_ar')->first())){{ old('fact_tow_title_ar') ?? $settings->where('key_name', 'fact_tow_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Tow Title In Arabic') }}" >  
                                                            <label for="fact_tow_title_ar">{{ __('locale.Fact Tow Title In Arabic') }}</label>
                                                            <input type="text" name="fact_two_num" value="@if(!is_null($settings->where('key_name', 'fact_two_num')->first())){{ old('fact_two_num') ?? $settings->where('key_name', 'fact_two_num')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Tow Number') }}" >  
                                                            <label for="fact_two_num">{{ __('locale.Fact Two Number') }}</label>

                                                            {{-- fact 3 --}}

                                                            <input type="text" name="fact_three_title_en" value="@if(!is_null($settings->where('key_name', 'fact_three_title_en')->first())){{ old('fact_three_title_en') ?? $settings->where('key_name', 'fact_three_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Three Title In English') }}" >
                                                            
                                                            <label for="fact_three_title_en">{{ __('locale.Fact Three Title In English') }}</label> 
                                                            <input type="text" name="fact_three_title_ar" value="@if(!is_null($settings->where('key_name', 'fact_three_title_ar')->first())){{ old('fact_three_title_ar') ?? $settings->where('key_name', 'fact_three_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Three Title In Arabic') }}" >  
                                                            <label for="fact_three_title_ar">{{ __('locale.Fact Three Title In Arabic') }}</label>
                                                            <input type="text" name="fact_three_num" value="@if(!is_null($settings->where('key_name', 'fact_three_num')->first())){{ old('fact_three_num') ?? $settings->where('key_name', 'fact_three_num')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Three Number') }}" >  
                                                            <label for="fact_three_num">{{ __('locale.Fact Three Number') }}</label>

                                                            {{-- fact 4 --}}

                                                             <input type="text" name="fact_four_title_en" value="@if(!is_null($settings->where('key_name', 'fact_four_title_en')->first())){{ old('fact_four_title_en') ?? $settings->where('key_name', 'fact_four_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Four Title In English') }}" >
                                                            
                                                            <label for="fact_four_title_en">{{ __('locale.Fact Four Title In English') }}</label> 
                                                            <input type="text" name="fact_four_title_ar" value="@if(!is_null($settings->where('key_name', 'fact_four_title_ar')->first())){{ old('fact_four_title_ar') ?? $settings->where('key_name', 'fact_four_title_ar')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Four Title In Arabic') }}" >  
                                                            <label for="fact_four_title_ar">{{ __('locale.Fact Four Title In Arabic') }}</label>
                                                            <input type="text" name="fact_four_num" value="@if(!is_null($settings->where('key_name', 'fact_four_num')->first())){{ old('fact_four_num') ?? $settings->where('key_name', 'fact_four_num')->first()->key_value  }}@endif" placeholder="{{ __('locale.Fact Four Number') }}" >  
                                                            <label for="fact_four_num">{{ __('locale.Fact Four Number') }}</label>


                                                            </p>
                                                        </div>

                                                        <div id="Download" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="download_title_en" value="@if(!is_null($settings->where('key_name', 'download_title_en')->first())){{ old('download_title_en') ?? $settings->where('key_name', 'download_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.Title In Englisg') }}" >
                                                            
                                                            <label for="download_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="download_title_ar" value="@if(!is_null($settings->where('key_name', 'download_title_ar')->first())){{ old('download_title_ar') ?? $settings->where('key_name', 'download_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="download_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="download_desc_en" id="download_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'download_desc_en')->first())){{ old('download_desc_en') ?? $settings->where('key_name', 'download_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="download_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="download_desc_ar" id="download_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'download_desc_ar')->first())){{ old('download_desc_ar') ?? $settings->where('key_name', 'download_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="download_desc_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>

                                                        <div id="Testimonials" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                   <input type="text" name="testimonial_title_en" value="@if(!is_null($settings->where('key_name', 'testimonial_title_en')->first())){{ old('testimonial_title_en') ?? $settings->where('key_name', 'testimonial_title_en')->first()->key_value  }}@endif" placeholder="{{ __('locale.Title In Englisg') }}" >
                                                            
                                                            <label for="testimonial_title_en">{{ __('locale.Title In Englisg') }}</label>  
  

                                                            <input type="text" name="testimonial_title_ar" value="@if(!is_null($settings->where('key_name', 'testimonial_title_ar')->first())){{ old('testimonial_title_ar') ?? $settings->where('key_name', 'testimonial_title_ar')->first()->key_value  }}@endif" placeholder="Title In Arabic" >  
                                                            <label for="testimonial_title_ar">{{ __('locale.Title In Arabic') }}</label>

                                                            <textarea name="testimonial_desc_en" id="testimonial_desc_en" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'testimonial_desc_en')->first())){{ old('testimonial_desc_en') ?? $settings->where('key_name', 'testimonial_desc_en')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="testimonial_desc_en">{{ __('locale.Description In English') }}</label>  

                                                            <textarea name="testimonial_desc_ar" id="testimonial_desc_ar" class="materialize-textarea">@if(!is_null($settings->where('key_name', 'testimonial_desc_ar')->first())){{ old('testimonial_desc_ar') ?? $settings->where('key_name', 'testimonial_desc_ar')->first()->key_value  }}@endif</textarea>
                                                                
                                                            <label for="testimonial_desc_ar">{{ __('locale.Description In Arabic') }}</label>   
                                                            </p>
                                                        </div>

                                                        <div id="address_social_links" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">

                                                                <input type="text" name="phone" value="@if(!is_null($settings->where('key_name', 'phone')->first())){{ old('phone') ?? $settings->where('key_name', 'phone')->first()->key_value  }}@endif" placeholder="{{ __('locale.Phone') }}" >  
                                                            <label for="phone">{{ __('locale.Phone') }}</label>

                                                            <input type="text" name="email" value="@if(!is_null($settings->where('key_name', 'email')->first())){{ old('email') ?? $settings->where('key_name', 'email')->first()->key_value  }}@endif" placeholder="{{ __('locale.Email') }}" >  
                                                            <label for="email">{{ __('locale.Email') }}</label>

                                                            <input type="text" name="address" value="@if(!is_null($settings->where('key_name', 'address')->first())){{ old('address') ?? $settings->where('key_name', 'address')->first()->key_value  }}@endif" placeholder="{{ __('locale.Address') }}" >  
                                                            <label for="address">{{ __('locale.Address') }}</label>

                                                            <input type="text" name="ar_address" value="@if(!is_null($settings->where('key_name', 'ar_address')->first())){{ old('ar_address') ?? $settings->where('key_name', 'ar_address')->first()->key_value  }}@endif" placeholder="{{ __('locale.Arabic Address') }}" >  
                                                            <label for="address">{{ __('locale.Arabic Address') }}</label>

                                                            <input type="text" name="facebook_link" value="@if(!is_null($settings->where('key_name', 'facebook_link')->first())){{ old('facebook_link') ?? $settings->where('key_name', 'facebook_link')->first()->key_value  }}@endif" placeholder="{{ __('locale.Facebook Link') }}" >  
                                                            <label for="facebook_link">{{ __('locale.Facebook Link') }}</label>

                                                            <input type="text" name="twitter_link" value="@if(!is_null($settings->where('key_name', 'twitter_link')->first())){{ old('twitter_link') ?? $settings->where('key_name', 'twitter_link')->first()->key_value  }}@endif" placeholder="{{ __('locale.Twitter Link') }}" >  
                                                            <label for="twitter_link">{{ __('locale.Twitter Link') }}</label>

                                                             <input type="text" name="instagram_link" value="@if(!is_null($settings->where('key_name', 'instagram_link')->first())){{ old('instagram_link') ?? $settings->where('key_name', 'instagram_link')->first()->key_value  }}@endif" placeholder="{{ __('locale.Instagram Link') }}" >  
                                                            <label for="instagram_link">{{ __('locale.Instagram Link') }}</label>

                                                            <input type="text" name="linkden_link" value="@if(!is_null($settings->where('key_name', 'linkden_link')->first())){{ old('linkden_link') ?? $settings->where('key_name', 'linkden_link')->first()->key_value  }}@endif" placeholder="{{ __('locale.Linkden Link') }}" >  
                                                            <label for="linkden_link">{{ __('locale.Linkden Link') }}</label>

                                                            </p>
                                                        </div> 
                                                        <div id="application_home_text" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">

                                                                <input type="text" name="home_screen_text" value="@if(!is_null($settings->where('key_name', 'home_screen_text')->first())){{ old('home_screen_text') ?? $settings->where('key_name', 'home_screen_text')->first()->key_value  }}@endif" placeholder="{{ __('locale.application_home_screen_text') }}" >  
                                                            <label for="home_screen_text">{{ __('locale.application_home_screen_text') }}</label>

                                                            </p>
                                                        </div>

                                                        {{-- <div id="Features2" class="col s12" style="display: block;">
                                                            <p class="mt-2 mb-2">
                                                                ok
                                                            </p>
                                                        </div> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col s12 display-flex justify-content-end mt-5">
						                <button type="submit" class="btn indigo">    
						                  Save</button>
						            </div>            
						       </div>
                        </div>
                    </form>
                    <!-- users edit account form ends -->
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
<!-- users edit ends -->
@endsection {{-- vendor scripts --}} @section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
{{--
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
--}} @endsection {{-- page scripts --}} @section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
@endsection
