<?php

##### groups routes
Route::get('groups', 'GroupController@index')->name('groups');
Route::get('add-group', 'GroupController@add_groups')->name('add_group');
Route::post('/add_group_post', 'GroupController@add_group_post');
Route::get('/del-groups/{id}', 'GroupController@del_groups');
Route::get('/edit-groups/{id}', 'GroupController@edit_groups');
Route::post('/update_group_post', 'GroupController@update_group_post');
Route::get('group-permission/{slug}', 'GroupController@group_permission')->name('group_permission');
Route::post('update_permission', 'GroupController@update_permission');



##### permissions routes
Route::get('permissions', 'PermissionsController@index')->name('permissions');
Route::get('add-permission', 'PermissionsController@add_permission')->name('add_permission');
Route::post('/add_permission_post', 'PermissionsController@add_permission_post');
Route::get('/del-permission/{id}', 'PermissionsController@del_permission');
Route::get('/edit-permission/{id}', 'PermissionsController@edit_permission');
Route::post('/update_permission_post', 'PermissionsController@update_permission_post');


####### customer routes
Route::get('/list-customer', 'CustomerController@index')->name('customer');
Route::get('/add-customer', 'CustomerController@add_customer');
Route::post('/add-customer-post', 'CustomerController@add_customer_post');
Route::get('/del-customer/{id}', 'CustomerController@del_customer');
Route::get('/edit-customer/{id}', 'CustomerController@edit_customer');
Route::post('/update-customer', 'CustomerController@update_customer_post');
Route::post('/customer-status', 'CustomerController@update_status_post');


####### coupon routes
Route::get('/coupon-list', 'CouponController@index')->name('coupons');
Route::get('/add-coupon', 'CouponController@add_coupon');
Route::post('/add-coupon-post', 'CouponController@add_coupon_post');
Route::get('/del-coupon/{id}', 'CouponController@del_coupon');
Route::get('/edit-coupon/{id}', 'CouponController@edit_coupon');
Route::post('/update-coupon', 'CouponController@update_coupon_post');
Route::post('/coupon-status', 'CouponController@update_status_post');


