<?php



use Illuminate\Http\Request;



/*

|--------------------------------------------------------------------------

| API Routes

|--------------------------------------------------------------------------

|

| Here is where you can register API routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| is assigned the "api" middleware group. Enjoy building your API!

|

*/



Route::group([

    'prefix' => 'auth'

  ], function () {

    Route::post('register','AuthController@register');



    Route::post('login','AuthController@login');

    Route::post('forgetpassword','AuthController@forgetPassword');



    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('user','AuthController@user');
        Route::post('user','AuthController@updateUser');

        Route::get('logout','AuthController@logout');

    });

});



// Forget password

Route::post('password/forget', 'Auth\ForgotPasswordController@getResetToken');

Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::group(['middleware' => 'auth:api'], function () {



//Package Plans Endpoints

// Route::get('/package-plans', 'PlansController@index')->middleware('permissions:package-plans');

Route::post('/token/{id}', 'UserController@store_token');

Route::post('/plans-status', 'PlansController@plans_status')->middleware('permissions:plans-status');

Route::get('/del-package-plans/{id}', 'PlansController@del_package')->middleware('permissions:del-package-plans');

Route::post('/add_package_post', 'PlansController@add_package_post')->middleware('permissions:add_package_post');

// Route::get('/package-durations', 'PlansController@package_durations')->middleware('permissions:package-durations');

// Route::get('/plan-features', 'PlansController@plan_features')->middleware('permissions:plan-features');

Route::post('/edit_package_post', 'PlansController@edit_package_post')->middleware('permissions:edit_package_post');

Route::get('/del-feature/{id}', 'PlansController@del_feature')->middleware('permissions:del-feature');

Route::get('/del-duration/{id}', 'PlansController@del_duration')->middleware('permissions:del-duration');

Route::post('/add_duration_post', 'PlansController@add_duration_post')->middleware('permissions:add_duration_post');

Route::post('/add_feature_post', 'PlansController@add_feature_post')->middleware('permissions:add_feature_post');

Route::post('/edit_feature_post', 'PlansController@edit_feature_post')->middleware('permissions:edit_feature_post');

Route::post('/edit_duration_post', 'PlansController@edit_duration_post')->middleware('permissions:edit_duration_post');



//User Subscription

Route::post('/user-plan-buy', 'PlansController@user_plan_buy');





//Secretary Plans Endpoints

Route::get('/list-secretary', 'SecretaryController@index')->middleware('permissions:list-secretary');

Route::post('/add-secretary', 'SecretaryController@add_secretary_post')->middleware('permissions:add-secretary');

Route::get('/del-secretary/{id}', 'SecretaryController@del_secretary')->middleware('permissions:del-secretary');

Route::post('/update-secretary', 'SecretaryController@update_secretary_post')->middleware('permissions:update-secretary');

Route::post('/secretary-status', 'SecretaryController@update_status_post')->middleware('permissions:secretary-status');



// Client Voice Message

Route::post('/send-voice-message', 'MessageController@insert_voice_message');

Route::post('/client-voice-messages', 'MessageController@client_voice_messages');



// Chat Messages

Route::post('/send-message', 'MessageController@send_message');

Route::get('/chat-messages', 'MessageController@chat_messages');



// Trips - appointment - socialevent - meeting - socialservice - hotelbooking

Route::post('/trip-create', 'BookingController@trip_create');

Route::post('/appointment-create', 'BookingController@appointment_create');

Route::post('/socialevent-create', 'BookingController@socialevent_create');

Route::post('/meeting-create', 'BookingController@meeting_create');

Route::post('/socialservice-create', 'BookingController@socialservice_create');

Route::post('/hotelbooking-create', 'BookingController@hotelbooking_create');



// Secretary dashboard data

// request to get booking list with user id and request type
Route::post('/secretary-dashboard', 'SecretaryController@secretary_dashboard');

Route::get('/secretary-clients', 'SecretaryController@secretary_client_list');

// request to get all data on every booking tables with user id and status type
Route::post('/secretary-all', 'SecretaryController@secretary_all');

// update status data with booking type and status param
Route::post('/secretary-item-status', 'SecretaryController@secretary_item_status');

});

Route::get('/secretary-clients', 'SecretaryController@secretary_client_list');

//Work List and Cities List

Route::get('/work-list', 'GeneralFieldsController@work');

Route::get('/cities-list', 'GeneralFieldsController@return_cities');

Route::get('/titles-list', 'GeneralFieldsController@return_titles');


//Customer List

Route::get('/customers-list', 'CustomerController@index');



// Package Plans

Route::get('/package-plans', 'PlansController@index');

Route::get('/plan-features', 'PlansController@plan_features');

Route::get('/package-durations', 'PlansController@package_durations');

// home screen
Route::get('/home-screen-text', 'HomeController@get_home_screen_text');
Route::get('/terms-and-conditions', 'HomeController@api_term_and_conditions');

/*Contacts Api*/
Route::post('add_contacts','CustomerController@add_contacts');
Route::get('get_contacts/{id}','CustomerController@get_contacts');
Route::get('delete_contact/{id}','CustomerController@delete_contact');


Route::post('make_payment','CustomerController@make_payment');

Route::post('get_discount_amount', 'CustomerController@getDiscountAmount');

