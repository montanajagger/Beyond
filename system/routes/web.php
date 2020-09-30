<?php

use App\Http\Controllers\LanguageController;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

 */



Route::get('/clear-cache', function() {

    $exitCode = Artisan::call('cache:clear');

    return "Cleared!!!";

});



// Dashboard Route





Route::get('/clear', function() {

    $exitCode = Artisan::call('cache:clear');

    // return what you want

});



// Route::get('/', function() {

//     return view('index');

// });

Route::get('/', 'HomeController@new_home');

Route::get('/terms', 'HomeController@term_and_conditions_view');



Route::get('/logout', function() {

    Auth::logout();

    return redirect('login');

});



Auth::routes();

//prefix('admin')->

Route::middleware(['auth'])->group(function () {





Route::get('/dashboard', 'DashboardController@dashboardModern');

// Route::get('/list-city', 'DashboardController@dashboardModern');

Route::get('/modern', 'DashboardController@dashboardModern');

Route::get('/ecommerce', 'DashboardController@dashboardEcommerce');

Route::get('/analytics', 'DashboardController@dashboardAnalytics');



// Sub Admins Routes

Route::get('/sub-admins', 'SubAdminController@index');

Route::get('/add-sub-admin', 'SubAdminController@add_sub_admins');

Route::post('/add-sub-admin', 'SubAdminController@add_subadmin_post');

Route::get('/del-sub-admin/{id}', 'SubAdminController@del_sub_admins');

Route::get('/edit-sub-admin/{id}', 'SubAdminController@edit_sub_admins');

Route::post('/update-sub-admin', 'SubAdminController@update_subadmin_post');



// Terms and Conditions

Route::get('/terms-and-conditions', 'HomeController@term_and_conditions');

Route::post('/update_term_and_conditions', 'HomeController@update_term_and_conditions');



// Package Plans

//Route::get('/package-plans', 'PlansController@index')->middleware('permissions:package-plans');

Route::get('/package-plans', 'PlansController@index')->name('package-plans');

Route::get('/plan-features', 'PlansController@plan_features')->name('plan-features');

Route::get('/package-durations', 'PlansController@package_durations')->name('package-durations');

Route::get('/add-package-plans', 'PlansController@add_package')->name('add-package-plans');

Route::post('/add_package_post', 'PlansController@add_package_post')->name('add_package_post');

Route::get('/del-package-plans/{id}', 'PlansController@del_package')->name('del-package-plans');

Route::get('/edit-package-plans/{id}', 'PlansController@edit_package')->name('edit-package-plans');

Route::post('/edit_package_post', 'PlansController@edit_package_post')->name('edit_package_post');

Route::post('/plans-status', 'PlansController@plans_status')->name('plans-status');

Route::post('/edit_feature_post', 'PlansController@edit_feature_post')->name('edit_feature_post');

Route::get('/del-feature/{id}', 'PlansController@del_feature')->name('del-feature');

Route::post('/add_feature_post', 'PlansController@add_feature_post')->name('add_feature_post');



Route::post('/edit_duration_post', 'PlansController@edit_duration_post')->name('edit_duration_post');

Route::get('/del-duration/{id}', 'PlansController@del_duration')->name('del-duration');

Route::post('/add_duration_post', 'PlansController@add_duration_post')->name('add_duration_post');


// Subscriptions
Route::get('/subscriptions', 'SubscriptionsController@list')->name('subscriptions.list');

Route::put('/subscription_secretary_changed/{subscription_id}/{secretary_id}', 'SubscriptionsController@updateSecretary');



// General Fields Routes

Route::get('/cities', 'GeneralFieldsController@cities');

Route::post('/edit_cities', 'GeneralFieldsController@edit_cities');

Route::get('/del-cities/{id}', 'GeneralFieldsController@del_cities');

Route::post('/add_cities', 'GeneralFieldsController@add_cities');


Route::get('/titles', 'GeneralFieldsController@titles');

Route::post('/edit_title', 'GeneralFieldsController@edit_title');

Route::get('/del-title/{id}', 'GeneralFieldsController@del_title');

Route::post('/add_title', 'GeneralFieldsController@add_title');

// booking management api
Route::get('/trips', 'BookingController@trips');

Route::get('/accept-trip/{id}', 'BookingController@acceptTrip');

Route::get('/reject-trip/{id}', 'BookingController@rejectTrip');

Route::get('/accept-hotel/{id}', 'BookingController@acceptHotel');

Route::get('/reject-hotel/{id}', 'BookingController@rejectHotel');

Route::get('/socialevents', 'BookingController@SocialEvents');

Route::get('/meeting', 'BookingController@Meeting');

Route::get('/hotel', 'BookingController@Hotel');

Route::get('/secondary_services', 'BookingController@SecondaryServices');

Route::get('/contacts', 'BookingController@Contacts');
/////////////////////////////////

Route::get('/work', 'GeneralFieldsController@work');

Route::post('/edit_work', 'GeneralFieldsController@edit_work');

Route::get('/del-work/{id}', 'GeneralFieldsController@del_work');

Route::post('/add_work', 'GeneralFieldsController@add_work');

/*==========================================

=            Home Page Settings            =

==========================================*/



Route::get('/home-page-settings', 'SettingsController@get_page');

Route::post('/home_page_settings', 'SettingsController@home_page_settings');





/*=====  End of Home Page Settings  ======*/



/*====================================

=            testimonials            =

====================================*/



Route::get('/testimonials', 'GeneralFieldsController@testimonials');

Route::get('/add-testimonials', function(){

	return view('testimonials.add');

});

Route::post('/add-testimonials', 'GeneralFieldsController@add_testimonials');

Route::get('/del-testimonials/{id}', 'GeneralFieldsController@del_testimonials');





/*=====  End of testimonials  ======*/







/*=============================================

=            Secretary Page            =

=============================================*/



include('talha.php');





/*=====  End of Section Secretary Page  ======*/





// Application Route

Route::get('/app-email', 'ApplicationController@emailApp');

Route::get('/app-email/content', 'ApplicationController@emailContentApp');

Route::get('/app-chat', 'ApplicationController@chatApp');

Route::get('/app-todo', 'ApplicationController@todoApp');

Route::get('/app-kanban', 'ApplicationController@kanbanApp');

Route::get('/app-file-manager', 'ApplicationController@fileManagerApp');

Route::get('/app-contacts', 'ApplicationController@contactApp');

Route::get('/app-calendar', 'ApplicationController@calendarApp');

Route::get('/app-invoice-list', 'ApplicationController@invoiceList');

Route::get('/app-invoice-view', 'ApplicationController@invoiceView');

Route::get('/app-invoice-edit', 'ApplicationController@invoiceEdit');

Route::get('/app-invoice-add', 'ApplicationController@invoiceAdd');

Route::get('/eCommerce-products-page', 'ApplicationController@ecommerceProduct');

Route::get('/eCommerce-pricing', 'ApplicationController@eCommercePricing');



// User profile Route

Route::get('/user-profile-page', 'UserProfileController@userProfile');



// Page Route

Route::get('/page-contact', 'PageController@contactPage');

Route::get('/page-blog-list', 'PageController@pageBlogList');

Route::get('/page-search', 'PageController@searchPage');

Route::get('/page-knowledge', 'PageController@knowledgePage');

Route::get('/page-knowledge/licensing', 'PageController@knowledgeLicensingPage');

Route::get('/page-knowledge/licensing/detail', 'PageController@knowledgeLicensingPageDetails');

Route::get('/page-timeline', 'PageController@timelinePage');

Route::get('/page-faq', 'PageController@faqPage');

Route::get('/page-faq-detail', 'PageController@faqDetailsPage');

Route::get('/page-account-settings', 'PageController@accountSetting');

Route::get('/page-blank', 'PageController@blankPage');

Route::get('/page-collapse', 'PageController@collapsePage');



// Media Route

Route::get('/media-gallery-page', 'MediaController@mediaGallery');

Route::get('/media-hover-effects', 'MediaController@hoverEffect');



// User Route

Route::get('/page-users-list', 'UserController@usersList');

Route::get('/page-users-view', 'UserController@usersView');

Route::get('/page-users-edit', 'UserController@usersEdit');



// Card Route

Route::get('/cards-basic', 'CardController@cardBasic');

Route::get('/cards-advance', 'CardController@cardAdvance');

Route::get('/cards-extended', 'CardController@cardsExtended');



// Css Route

Route::get('/css-typography', 'CssController@typographyCss');

Route::get('/css-color', 'CssController@colorCss');

Route::get('/css-grid', 'CssController@gridCss');

Route::get('/css-helpers', 'CssController@helpersCss');

Route::get('/css-media', 'CssController@mediaCss');

Route::get('/css-pulse', 'CssController@pulseCss');

Route::get('/css-sass', 'CssController@sassCss');

Route::get('/css-shadow', 'CssController@shadowCss');

Route::get('/css-animations', 'CssController@animationCss');

Route::get('/css-transitions', 'CssController@transitionCss');



// Basic Ui Route

Route::get('/ui-basic-buttons', 'BasicUiController@basicButtons');

Route::get('/ui-extended-buttons', 'BasicUiController@extendedButtons');

Route::get('/ui-icons', 'BasicUiController@iconsUI');

Route::get('/ui-alerts', 'BasicUiController@alertsUI');

Route::get('/ui-badges', 'BasicUiController@badgesUI');

Route::get('/ui-breadcrumbs', 'BasicUiController@breadcrumbsUI');

Route::get('/ui-chips', 'BasicUiController@chipsUI');

Route::get('/ui-chips', 'BasicUiController@chipsUI');

Route::get('/ui-collections', 'BasicUiController@collectionsUI');

Route::get('/ui-navbar', 'BasicUiController@navbarUI');

Route::get('/ui-pagination', 'BasicUiController@paginationUI');

Route::get('/ui-preloader', 'BasicUiController@preloaderUI');



// Advance UI Route

Route::get('/advance-ui-carousel', 'AdvanceUiController@carouselUI');

Route::get('/advance-ui-collapsibles', 'AdvanceUiController@collapsibleUI');

Route::get('/advance-ui-toasts', 'AdvanceUiController@toastsUI');

Route::get('/advance-ui-tooltip', 'AdvanceUiController@tooltipUI');

Route::get('/advance-ui-dropdown', 'AdvanceUiController@dropdownUI');

Route::get('/advance-ui-feature-discovery', 'AdvanceUiController@discoveryFeature');

Route::get('/advance-ui-media', 'AdvanceUiController@mediaUI');

Route::get('/advance-ui-modals', 'AdvanceUiController@modalUI');

Route::get('/advance-ui-scrollspy', 'AdvanceUiController@scrollspyUI');

Route::get('/advance-ui-tabs', 'AdvanceUiController@tabsUI');

Route::get('/advance-ui-waves', 'AdvanceUiController@wavesUI');

Route::get('/fullscreen-slider-demo', 'AdvanceUiController@fullscreenSlider');



// Extra components Route

Route::get('/extra-components-range-slider', 'ExtraComponentsController@rangeSlider');

Route::get('/extra-components-sweetalert', 'ExtraComponentsController@sweetalert');

Route::get('/extra-components-nestable', 'ExtraComponentsController@nestable');

Route::get('/extra-components-treeview', 'ExtraComponentsController@treeview');

Route::get('/extra-components-ratings', 'ExtraComponentsController@ratings');

Route::get('/extra-components-tour', 'ExtraComponentsController@tour');

Route::get('/extra-components-i18n', 'ExtraComponentsController@i18n');

Route::get('/extra-components-highlight', 'ExtraComponentsController@highlight');



// Basic Tables Route

Route::get('/table-basic', 'BasicTableController@tableBasic');



// Data Table Route

Route::get('/table-data-table', 'DataTableController@dataTable');



// Form Route

Route::get('/form-elements', 'FormController@fromElement');

Route::get('/form-select2', 'FormController@formSelect2');

Route::get('/form-validation', 'FormController@formValidatation');

Route::get('/form-masks', 'FormController@masksForm');

Route::get('/form-editor', 'FormController@formEditor');

Route::get('/form-file-uploads', 'FormController@fileUploads');

Route::get('/form-layouts', 'FormController@formLayouts');

Route::get('/form-wizard', 'FormController@formWizard');



// Charts Route

Route::get('/charts-chartjs', 'ChartController@chartJs');

Route::get('/charts-chartist', 'ChartController@chartist');

Route::get('/charts-sparklines', 'ChartController@sparklines');





include('ali.php');

});





// locale route

Route::get('lang/{locale}',[LanguageController::class, 'swap']);



// Authentication Route

Route::get('/user-login', 'AuthenticationController@userLogin');

Route::get('/user-register', 'AuthenticationController@userRegister');

Route::get('/user-forgot-password', 'AuthenticationController@forgotPassword');

Route::get('/user-lock-screen', 'AuthenticationController@lockScreen');



// Misc Route

Route::get('/page-404', 'MiscController@page404');

Route::get('/page-maintenance', 'MiscController@maintenancePage');

Route::get('/page-500', 'MiscController@page500');



Route::get('paytab_payment2',function(){
	return 'HELLO';});

Route::get('paytab_payment','CustomerController@paytab_payment');

Route::any('success','CustomerController@callback');
// Route::any('callback',function(){
	// echo json_encode($_REQUEST);
// });

// Route::post('/callback', function(Request $request){
//     $pt = Paytabs::getInstance("MERCHANT_EMAIL", "SECRET_KEY");
//     $result = $pt->verify_payment($request->payment_reference);
//     if($result->response_code == 100){
//         // Payment Success
//         @dd('Hello World!');
//     }
//     return $result->result;
// });
// Route::get('callback',function(){echo"Transaction Done Successfully";});

Route::any('make_payment','CustomerController@make_payment');
