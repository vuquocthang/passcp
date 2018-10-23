<?php


Route::group(['namespace' => 'Admin', 'prefix' => ''], function () {
    Route::get('/', function (){
        return redirect('login');
    });

    Route::get('/login', 'LoginController@showLoginForm');

    Route::post('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout');

    Route::group(['middleware' => 'auth.user'], function (){
        Route::get('/home', 'HomeController@index');

        #nhap du lieu
        Route::get('/add', 'HomeController@addForm');

        Route::post('/add', 'HomeController@add');

        #danh sach clone
        Route::get('/clones', 'HomeController@clones');

        #xoa danh sach
        Route::get('/delete/{id}', 'HomeController@deleteClone');

        #backup
        Route::get('/backup/{id}', 'HomeController@backup');

        #backup by friend
        Route::get('/backupByFriend/{id}', 'HomeController@backupByFriend');

        #is checkpoint
        Route::get('/isCheckpoint/{id}', 'HomeController@isCheckpoint');

        #pass checkpoint
        Route::get('/passCheckpoint/{id}', 'HomeController@passCheckpoint');

        #tên
        Route::get('/names', 'HomeController@addNameForm');


        Route::post('/names', 'HomeController@addName');

        #nhóm
        Route::post('/group', 'HomeController@addGroup');

        #group routes
        Route::group(['prefix' => 'group'], function (){
            Route::post('change', 'GroupController@changeGroup');

            Route::post('add', 'GroupController@add');
        });

        #name routes
        Route::group(['prefix' => 'name'], function (){
            Route::get('add', 'NameController@addForm');

            Route::get('delete/{path}', 'NameController@delete');

            Route::get('view/{path}', 'NameController@view');

            Route::post('add', 'NameController@add');

            Route::post('change', 'NameController@change');
        });


    });
});


require_once "test.php";
require_once "test_pass_checkpoint.php";