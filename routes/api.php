<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'namespace'=>'\\App\\Http\\Controllers\\API\V1\\',
        'prefix'=>'1/users',
        'as'=>'api.v1.users.'
    ],function (){
    Route::get('/','UserController@index')->name('index');
    Route::get('/{user}','UserController@show')->name('show');
    Route::post('/','UserController@store')->name('store');
    Route::put('/{user}','UserController@update')->name('update');
}
);

Route::group(
    [
        'namespace'=>'\\App\\Http\\Controllers\\API\V1\\',
        'prefix'=>'1/projects',
        'as'=>'api.v1.projects.'
    ],function (){
    Route::get('/','ProjectController@index')->name('index');
    Route::get('/{project}','ProjectController@show')->name('show');
    Route::post('/','ProjectController@store')->name('store');
    Route::put('/{project}','ProjectController@update')->name('update');
}
);
