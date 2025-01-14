<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PageController@index')->name('show.index');
    Route::post('/upload', 'MusicController@upload')->name('upload');
    Route::post('/convert', 'MusicController@convert')->name('convert');

    Route::get('/login', 'Auth\LoginController@redirectToGoogle')->name('google.login');
    Route::get('/auth/google/callback', 'Auth\LoginController@googleCallback')->name('google.callback');;



    // Authenticated routes
    Route::group(['middleware' => ['auth']], function () {
        Route::post('/delete/{song}', 'MusicController@delete')->name('song.delete');
        Route::post('/update/{song}', 'MusicController@update')->name('song.update');
    });
});