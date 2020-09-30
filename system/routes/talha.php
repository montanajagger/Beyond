<?php


Route::get('/list-secretary', 'SecretaryController@index');
Route::get('/add-secretary', 'SecretaryController@add_secretary');
Route::post('/add-secretary', 'SecretaryController@add_secretary_post');
Route::get('/del-secretary/{id}', 'SecretaryController@del_secretary');
Route::get('/edit-secretary/{id}', 'SecretaryController@edit_secretary');
Route::post('/update-secretary', 'SecretaryController@update_secretary_post');
Route::post('/secretary-status', 'SecretaryController@update_status_post');




Route::get('/notification', 'NotificationController@index'); 
Route::get('/add-notification', 'NotificationController@add_noti'); 
Route::post('/add-notification', 'NotificationController@save_notification'); 
Route::get('/del-notification/{id}', 'NotificationController@del_notification');
Route::get('/edit-notification/{id}', 'NotificationController@edit_notification');
Route::post('/update-notification', 'NotificationController@update_notification_post');
