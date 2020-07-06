<?php

use Illuminate\Support\Facades\Route;
use PSP\profilegenerator\welcome;
use PSP\profilegenerator\src;
use PSP\profilegenerator\Greetr;

Route::get('/greet/{name}', function($sName) {
    $oGreetr = new Greetr();
    return $oGreetr->greet($sName);
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['namespace' => '\PSP\profilegenerator\src\Http\Controllers'], function() {
        Route::get('/profiles', 'ProfileController@index')->name('profiles.index');
        Route::post('/profiles', 'ProfileController@store')->name('profiles.store');
        Route::get('/profiles/create', 'ProfileController@create')->name('profiles.create');
        Route::get('/profiles/{profile}', 'ProfileController@show')->name('profiles.show');
        Route::get('/profiles/{profile}/edit', 'ProfileController@edit');
        Route::put('/profiles/{profile}', 'ProfileController@update')->name('profiles.update');
        Route::get('/profiles/{profile}/createprofile', 'ProfileController@createprofile');
    });
});

?>