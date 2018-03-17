<?php

Route::group(['namespace' => 'Admin', 'prefix' => ''], function () {
    Route::get('/login', 'LoginController@showLoginForm');

    Route::post('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout');

    Route::group(['middleware' => 'auth.admin'], function (){

        Route::get('/', 'HomeController@index');

        Route::get('/doi-mat-khau', function (){
            return view('admin.change-password');
        });

        Route::post('/doi-mat-khau', 'HomeController@changePassword');


        #category
        Route::get('/tien-do/them', 'TienDoController@showAddForm');

        Route::post('/tien-do/them', 'TienDoController@add');

        Route::get('/tien-do/', 'TienDoController@index');

        Route::get('/tien-do/sua/{id}', 'TienDoController@showEditForm');

        Route::post('/tien-do/sua/{id}', 'TienDoController@edit');

        Route::get('/tien-do/xoa/{id}', 'TienDoController@delete');

        Route::get('/tien-do/trang-thai/{id}', 'TienDoController@status');



        #story
        Route::get('/truyen/danh-sach', 'StoryController@index');

        Route::get('/truyen/them', 'StoryController@showAddForm');

        Route::post('/truyen/them', 'StoryController@add');

        Route::get('/truyen/sua/{id}', 'StoryController@showEditForm');

        Route::post('/truyen/sua/{id}', 'StoryController@edit');

        Route::get('/truyen/xoa/{id}', 'StoryController@delete');

        Route::get('/truyen/trang-thai/{id}', 'StoryController@status');


        #chapter
        Route::get('/chuong/danh-sach', 'ChapterController@index');

        Route::get('/chuong/them', 'ChapterController@showAddForm');

        Route::post('/chuong/them', 'ChapterController@add');

        Route::get('/chuong/sua/{id}', 'ChapterController@showEditForm');

        Route::post('/chuong/sua/{id}', 'ChapterController@edit');

        Route::get('/chuong/xoa/{id}', 'ChapterController@delete');

        Route::get('/chuong/trang-thai/{id}', 'ChapterController@status');


        #ads

        Route::get('/quang-cao/sua', 'AdsController@editForm');

        Route::post('/quang-cao/sua', 'AdsController@edit');

        Route::get('/quang-cao/truyen', function (){
            return view('admin.ads.story');
        });

        Route::post('/quang-cao/truyen', function (\Illuminate\Http\Request $request){
            $input = \Illuminate\Support\Facades\Request::all();

            $ads = Ads::findOrFail(2);

            if ($request->image_link != null) {
                //neu ten khac voi anh cu
                if ($request->image_link->getClientOriginalName() != null) {

                    $imageName = time() . '.' . $request->image_link->getClientOriginalExtension();
                    $request->image_link->move('public/image', $imageName);

                    $input['image_link'] = $imageName;

                }

            }

            $ads->fill($input);

            $ads->save();

            return redirect('admin/quang-cao/truyen');
        });

        Route::get('/quang-cao/chap', function (){
            return view('admin.ads.chap');
        });

        Route::post('/quang-cao/chap', function (\Illuminate\Http\Request $request){
            $input = \Illuminate\Support\Facades\Request::all();

            $ads = Ads::findOrFail(3);

            if ($request->image_link != null) {
                //neu ten khac voi anh cu
                if ($request->image_link->getClientOriginalName() != null) {

                    $imageName = time() . '.' . $request->image_link->getClientOriginalExtension();
                    $request->image_link->move('public/image', $imageName);

                    $input['image_link'] = $imageName;

                }

            }

            $ads->fill($input);

            $ads->save();

            return redirect('admin/quang-cao/chap');
        });

        #slider
        Route::get('/slider', 'SliderController@index');

        Route::get('/slider/them', 'SliderController@showAddForm');

        Route::post('/slider/them', 'SliderController@add');

        Route::get('/slider/xoa/{id}', 'SliderController@delete');

        Route::get('/slider/sua/{id}', 'SliderController@showEditForm');

        Route::post('/slider/sua/{id}', 'SliderController@edit');

        #banner
        Route::get('/banner', 'BannerController@index');

        Route::get('/banner/them', 'BannerController@showAddForm');

        Route::post('/banner/them', 'BannerController@add');

        Route::get('/banner/xoa/{id}', 'BannerController@delete');

        Route::get('/banner/sua/{id}', 'BannerController@showEditForm');

        Route::post('/banner/sua/{id}', 'BannerController@edit');

        #tour
        Route::get('/tour', 'TourController@index');

        Route::get('/tour/them', 'TourController@showAddForm');

        Route::post('/tour/them', 'TourController@add');

        Route::get('/tour/xoa/{id}', 'TourController@delete');

        Route::get('/tour/sua/{id}', 'TourController@showEditForm');

        Route::post('/tour/sua/{id}', 'TourController@edit');

        #admin-group
        Route::get('/group-admin/danh-sach', 'AdminGroupController@index');

        Route::get('/group-admin/them', 'AdminGroupController@showAddForm');

        Route::post('/group-admin/them', 'AdminGroupController@add');


        Route::get('/group-admin/xoa/{id}', 'AdminGroupController@delete');

        #truyen doc nhieu
        Route::get('/truyen-doc-nhieu/danh-sach', 'TopReadController@index');

        Route::get('/truyen-doc-nhieu/them', 'TopReadController@showAddForm');

        Route::post('/truyen-doc-nhieu/them', 'TopReadController@add');

        Route::get('/truyen-doc-nhieu/sua/{id}', 'TopReadController@showEditForm');

        Route::post('/truyen-doc-nhieu/sua/{id}', 'TopReadController@edit');


        Route::get('/truyen-doc-nhieu/xoa/{id}', 'TopReadController@delete');

        #truyen xem nhieu
        Route::get('/truyen-xem-nhieu/danh-sach', 'TopViewController@index');

        Route::get('/truyen-xem-nhieu/them', 'TopViewController@showAddForm');

        Route::post('/truyen-xem-nhieu/them', 'TopViewController@add');


        Route::get('/truyen-xem-nhieu/xoa/{id}', 'TopViewController@delete');


        Route::get('/truyen-xem-nhieu/sua/{id}', 'TopViewController@showEditForm');
        Route::post('/truyen-xem-nhieu/sua/{id}', 'TopViewController@edit');

        #truyen full
        Route::get('/truyen-full/danh-sach', 'FullController@index');

        Route::get('/truyen-full/them', 'FullController@showAddForm');

        Route::post('/truyen-full/them', 'FullController@add');


        Route::get('/truyen-full/xoa/{id}', 'FullController@delete');


        Route::get('/truyen-full/sua/{id}', 'FullController@showEditForm');
        Route::post('/truyen-full/sua/{id}', 'FullController@edit');



    });
});
