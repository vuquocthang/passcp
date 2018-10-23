<?php


Route::group([
        'prefix' => 'testPassCheckpoint',
        'namespace' => 'Test'
    ], function () {
    Route::get('/login', 'PassCpController@login');
});