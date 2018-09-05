<?php

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'UpdatesController@index')->name('home');
Route::get('/updates', 'UpdatesController@list');
Route::post('/updates', 'UpdatesController@create');
Route::get('/updates/suggestions', 'UpdatesController@userSuggestions');
Route::post('/', 'Auth\LoginController@login');
Route::view('/', 'signin')->middleware('guest')->name('login');
