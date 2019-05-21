<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@homePage')->name('homepage');
Route::get('/brand', 'HomeController@listPost')->name('brand');
Route::get('/news', 'HomeController@listPost')->name('news');
Route::get('/categories', 'HomeController@listPost')->name('categories');
Route::get('/products', 'HomeController@listPost')->name('products');
Route::get('/color-zoom', 'HomeController@listPost')->name('color');
Route::get('/news/{slug}', 'HomeController@showPost')->name('show-new');
Route::get('/brand/{slug}', 'HomeController@showPost')->name('show-brand');
Route::get('/color/{slug}', 'HomeController@showPost')->name('show-color');
Route::get('/{slug}.html', 'HomeController@showProduct')->name('show-product');
Route::get('/contact', 'ContactController@getCreate')->name('contact');
Route::post('/contact', 'ContactController@postCreate')->name('contact');

/*
|--------------------------------------------------------------------------
| Back-end Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // BANG TIN
    Route::get('/', '\App\Http\Controllers\Admin\HomeController@index')->name('dashboard');
    
    //SAN PHAM
    Route::prefix('san-pham')->group(function () {
        //quản lí sản phẩm
        Route::get('/danh-sach', '\App\Http\Controllers\Admin\ProductController@index')->name('list-sp');
        Route::get('/tao-moi', '\App\Http\Controllers\Admin\ProductController@create')->name('create-sp');
        Route::post('/tao-moi', '\App\Http\Controllers\Admin\ProductController@store')->name('create-sp');
        Route::get('/{slug}/sua', '\App\Http\Controllers\Admin\ProductController@edit')->name('update-sp');
        Route::post('/{slug}/sua', '\App\Http\Controllers\Admin\ProductController@update')->name('update-sp');
        Route::get('/{slug}/xoa', '\App\Http\Controllers\Admin\ProductController@destroy')->name('delete-sp');

        //Thong tin trang danh muc san pham
        Route::get('/danh-muc/tao-moi', '\App\Http\Controllers\Admin\CatController@getcreate')->name('create-dm');
        Route::post('/danh-muc/tao-moi', '\App\Http\Controllers\Admin\CatController@postcreate')->name('create-dm');
        Route::get('/danh-muc/sua/{id}', '\App\Http\Controllers\Admin\CatController@edit')->name('update-dm');
        Route::post('/danh-muc/sua/{id}', '\App\Http\Controllers\Admin\CatController@update')->name('update-dm');
        Route::get('/danh-muc/xoa/{id}', '\App\Http\Controllers\Admin\CatController@destroy')->name('delete-dm');
        Route::get('/danh-muc/danh-sach', '\App\Http\Controllers\Admin\CatController@index')->name('list-dm');

        //quy trinh san pham
        Route::get('/thong-tin-trang', '\App\Http\Controllers\Admin\ProductController@getInfoTrangDanhMuc')->name('thong-tin-trang');
        Route::get('/thong-tin-trang/thay-doi', '\App\Http\Controllers\Admin\ProductController@updateInfoTrangDanhMuc')
        ->name('thong-tin-trang-td');
        Route::post('/thong-tin-trang/thay-doi', '\App\Http\Controllers\Admin\ProductController@storeInfoTrangDanhMuc')
        ->name('thong-tin-trang-td');
    });

    //QUY TRINH_CONG NGHE
    Route::resource('extra', 'ExtraController');

    //VIDEO
    Route::resource('media', 'MediaController');

    //BO SUU TAP
    Route::resource('coll', 'CollController');
    Route::resource('media', 'MediaController');

    //TIN TUC
    Route::prefix('news')->group(function () {
        //quản lí bài viết
        Route::get('/thong-tin-trang', 'NewController@getInfoTrangDanhMuc')->name('page-news');

         //Thong tin trang
        Route::get('/tao-moi', 'NewController@getCreate')->name('create-news');
        Route::post('/tao-moi', 'NewController@postCreate')->name('create-news');

        Route::get('/sua/{id}', 'NewController@getEdit')->name('edit-news');
        Route::post('/sua/{id}', 'NewController@postEdit')->name('edit-news');

        Route::get('/del/{id}', 'NewController@getDelete')->name('del-news');

        Route::get('/danh-sach', 'NewController@index')->name('list-news');

        Route::get('/thong-tin-trang/thay-doi', 'NewController@updateInfoTrangDanhMuc')
        ->name('page-news-ed');
        Route::post('/thong-tin-trang/thay-doi', 'NewController@storeInfoTrangDanhMuc')
        ->name('page-news-ed');
    });

    //BRAND
    Route::prefix('brand')->group(function () {
        //quản lí bài viết
        Route::get('/thong-tin-trang', 'BrandController@getInfoTrangDanhMuc')->name('page-brand');

         //Thong tin trang
        Route::get('/tao-moi', 'BrandController@getCreate')->name('create-brand');
        Route::post('/tao-moi', 'BrandController@postCreate')->name('create-brand');

        Route::get('/sua/{id}', 'BrandController@getEdit')->name('edit-brand');
        Route::post('/sua/{id}', 'BrandController@postEdit')->name('edit-brand');

        Route::get('/del/{id}', 'BrandController@getDelete')->name('del-brand');

        Route::get('/danh-sach', 'BrandController@index')->name('list-brand');

        Route::get('/thong-tin-trang/thay-doi', 'BrandController@updateInfoTrangDanhMuc')
        ->name('page-brand-ed');
        Route::post('/thong-tin-trang/thay-doi', 'BrandController@storeInfoTrangDanhMuc')
        ->name('page-brand-ed');
    });

    //COLOR
    Route::prefix('color')->group(function () {
        //quản lí bài viết
        Route::get('/thong-tin-trang', 'ColorRoomController@getInfoTrangDanhMuc')->name('page-color');

         //Thong tin trang
        Route::get('/tao-moi', 'ColorRoomController@getCreate')->name('create-color');
        Route::post('/tao-moi', 'ColorRoomController@postCreate')->name('create-color');

        Route::get('/sua/{id}', 'ColorRoomController@getEdit')->name('edit-color');
        Route::post('/sua/{id}', 'ColorRoomController@postEdit')->name('edit-color');

        Route::get('/del/{id}', 'ColorRoomController@getDelete')->name('del-color');

        Route::get('/danh-sach', 'ColorRoomController@index')->name('list-color');

        Route::get('/thong-tin-trang/thay-doi', 'ColorRoomController@updateInfoTrangDanhMuc')
        ->name('page-color-ed');
        Route::post('/thong-tin-trang/thay-doi', 'ColorRoomController@storeInfoTrangDanhMuc')
        ->name('page-color-ed');
    });

    //LIEN HE
    Route::prefix('contact')->group(function () {
        Route::get('/list', 'ContactController@index')->name('list-contact');
        Route::get('/edit/{id}', 'ContactController@getEdit')->name('edit-contact');
        Route::post('/edit/{id}', 'ContactController@postEdit')->name('edit-contact');
    });
   
    //THU VIEN
    Route::get('/gallery', function () {
        return view('admin.gallery',['flag' => 'gallery']);
    })->name('gallery');

    Route::resource('system', 'SystemController');
});

//AUTH
Auth::routes();

Route::get('/home', '\App\Http\Controllers\Admin\ProductController@index')->name('home');

//AJAX
Route::post('/create-slug', 'HomeController@createSlug')->name('create-slug');
