<?php

Auth::routes(['verify'=>true]);

Route::get('home', 'HomeController@index')->middleware('verified');
Route::get('/','HomeController@index') ;
