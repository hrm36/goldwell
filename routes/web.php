<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');
/*
TUANNA START ADD 15-03-2019
 */
Route::get('/product', function () {
    return view('font-end.page.product');
})->name('product');
Route::get('/news', function () {
    return view('font-end.page.news');
})->name('news');
Route::get('/brand', function () {
    return view('font-end.page.brand');
})->name('brand');
Route::get('/post', function () {
    return view('font-end.page.single-post');
})->name('post');
Route::get('/contact', function () {
    return view('font-end.page.contact');
})->name('contact');
Route::get('/single', function () {
    return view('font-end.page.single-product');
})->name('single-product');
//Trang liên hệ [tuan]
Route::get('/contact', 'ContactController@getCreate')->name('contact');
Route::post('/contact', 'ContactController@postCreate')->name('contact');

/*
TUANNA START END 15-03-2019
 */
Route::middleware(['auth'])->prefix('admin')->group(function () {
    /*
        TUANNA START ADD 15-03-2019
    */
    //Quản lý thông tin liên hệ
    Route::prefix('contact')->group(function () {
        Route::get('/list', 'ContactController@index')->name('list-contact');
        Route::get('/edit/{id}', 'ContactController@getEdit')->name('edit-contact');
        Route::post('/edit/{id}', 'ContactController@postEdit')->name('edit-contact');
    });
    /*
        TUANNA START END 15-03-2019
    */
    Route::get('/', function () {
        return view('admin.layouts.default',['flag' => 'dashboard']);
    })->name('dashboard');
    Route::get('/gallery', function () {
        return view('admin.gallery',['flag' => 'gallery']);
    })->name('gallery');

    Route::prefix('user')->group(function () {
    	Route::get('/list', '\App\Http\Controllers\Admin\UserController@index')->name('list-user');
    });
    //Quản lý sản phẩm
    Route::prefix('san-pham')->group(function () {
        //quản lí sản phẩm
        Route::get('/danh-sach', '\App\Http\Controllers\Admin\ProductController@index')->name('list-sp');
        Route::get('/tao-moi', '\App\Http\Controllers\Admin\ProductController@create')->name('create-sp');
        Route::post('/tao-moi', '\App\Http\Controllers\Admin\ProductController@store')->name('create-sp');
        Route::get('/{slug}/sua', '\App\Http\Controllers\Admin\ProductController@edit')->name('update-sp');
        Route::post('/{slug}/sua', '\App\Http\Controllers\Admin\ProductController@update')->name('update-sp');
        Route::get('/{slug}/xoa', '\App\Http\Controllers\Admin\ProductController@destroy')->name('delete-sp');

        //Thong tin trang danh muc san pham
        Route::get('/danh-muc/tao-moi', '\App\Http\Controllers\Admin\CatController@create')->name('create-dm');
        Route::get('/danh-muc/danh-sach', '\App\Http\Controllers\Admin\CatController@index')->name('list-dm');

        //quy trinh san pham
        Route::get('/quy-trinh/tao-moi', '\App\Http\Controllers\Admin\QuytrinhController@create')->name('create-qt');



        Route::get('/thong-tin-trang', '\App\Http\Controllers\Admin\ProductController@getInfoTrangDanhMuc')->name('thong-tin-trang');
        Route::get('/thong-tin-trang/thay-doi', '\App\Http\Controllers\Admin\ProductController@updateInfoTrangDanhMuc')
        ->name('thong-tin-trang-td');
        Route::post('/thong-tin-trang/thay-doi', '\App\Http\Controllers\Admin\ProductController@storeInfoTrangDanhMuc')
        ->name('thong-tin-trang-td');
    });

    /*
        TUANNA START ADD 16-03-2019
    */
    //Quản lý bài viết tin tức
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

    //Quản lý Brand
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
     /*
        TUANNA START END 16-03-2019
    */
    //Quản lý quy trình
    Route::prefix('quy-trinh')->group(function () {
        //quản lí trang liên kết
        Route::get('/tao-moi', function () {
                return view('admin.quy-trinh.create',['flag' => 'quy_t_n']);
        })->name('create-qt');
    });


    //Quản lý thông tin hệ thống
    Route::prefix('system')->group(function () {
        //quản lí trang liên kết
        Route::prefix('lien-ket')->group(function () {
            Route::get('/danh-sach', function () {
                return view('admin.system.lien-ket.link-lien-ket',['flag' => 'lien_ket']);
            })->name('danh-sach-lien-ket');
            Route::get('/them-moi', function () {
                return view('admin.system.lien-ket.them-moi',['flag' => 'lien_ket']);
            })->name('them-moi-lien-ket');
        });
    });
});

Auth::routes();

Route::get('/home', '\App\Http\Controllers\Admin\ProductController@index')->name('home');
Route::post('/create-slug', 'HomeController@createSlug')->name('create-slug');
