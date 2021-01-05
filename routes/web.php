<?php

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/homeapi', function () {
//     return view('api.homeapi');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/api','ApiController@register');
Route::post('/update','ApiController@update');
Route::post('/delete','ApiController@delete');
Route::post('/edit','ApiController@edit');
Route::post('/proin','ApiController@proin');
Route::post('/log','ApiController@login');
Route::post('/pv','ApiController@showprovince');
Route::post('/geo','ApiController@showgeo');
Route::post('/dt','ApiController@showdistrict');
Route::post('/ap','ApiController@showamphur');
Route::post('/zc','ApiController@showzipcode');
Route::post('/show','ApiController@showjang');
Route::post('/fileUpload', 'ApiController@insertimg');






