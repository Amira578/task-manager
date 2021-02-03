<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'namespace'=>'V1',
        'prefix'=>'1',
        'as'=>'v1.'
    ],function (){
        Route::group([

            'prefix'=>'/users',
            'as'=>'users.'
        ],function (){
            Route::get('/','UserController@index')->name('index');
            Route::get('/{user}','UserController@show')->name('show');
            Route::post('/','UserController@store')->name('store');
            Route::put('/{user}','UserController@update')->name('update');
            Route::delete('/{user}','UserController@destroy')->name('destroy');

        });

        Route::group([
            'prefix'=>'/projects',
            'as'=>'projects.'
        ],function (){
            Route::get('/','ProjectController@index')->name('index');
            Route::get('/{project}','ProjectController@show')->name('show');
            Route::post('/','ProjectController@store')->name('store');
            Route::put('/{project}','ProjectController@update')->name('update');

        });
    Route::group([
        'prefix'=>'/tasks',
        'as'=>'tasks.'
    ],function (){
        Route::get('/','TaskController@index')->name('index');
        Route::get('/{task}','TaskController@show')->name('show');
        Route::post('/','TaskController@store')->name('store');
        Route::put('/{task}','TaskController@update')->name('update');

    });
    Route::group([
        'prefix'=>'/tags',
        'as'=>'tags.'
    ],function (){
        Route::get('/','TagController@index')->name('index');
        Route::get('/{task}','TagController@show')->name('show');
        Route::post('/','TagController@store')->name('store');
        Route::put('/{task}','TagController@update')->name('update');

    });

}
);

