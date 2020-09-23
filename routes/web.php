<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});


Route::get('demo',function(){
	return view("mail");
});



Route::group(['namespace' =>'Admin','prefix' => 'backend'],function(){

	Route::get('login',['as'=>'login','uses'=>'LoginController@showLoginForm']);
	Route::post('login', [ 'as' => 'backend.login', 'uses' => 'LoginController@login']);

	Route::post('logout',['as'=>'logout','uses'=>'LoginController@logout']);

Route::group(['middleware' => 'auth:admin'], function () {

	Route::resource('category','CategoryController');
	Route::group(['prefix'=>'category'],function(){
		Route::get('/active/{id?}',['as' => 'category.active','uses' => 'CategoryController@active']);
	});



	Route::resource('producer','ProducerController');
	Route::group(['prefix'=>'producer'],function(){
		Route::get('/active/{id?}',['as' => 'producer.active','uses' => 'ProducerController@active']);
	});


	Route::group(['prefix'=>'product'],function(){
		Route::get('/active/{id?}',['as' => 'product.active','uses' => 'ProductController@active']);
		Route::get('/hot/{id?}',['as' => 'product.hot','uses' => 'ProductController@hot']);
		Route::get('/new/{id?}',['as' => 'product.new','uses' => 'ProductController@new']);
		Route::get('/search',['as' => 'product.search','uses' => 'ProductController@search']);
	});
	Route::resource('product','ProductController');


	Route::resource('banner','BannerController');
	Route::group(['prefix'=>'banner'],function(){
		Route::get('/active/{id?}',['as' => 'banner.active','uses' => 'BannerController@active']);
	});


	Route::group(['prefix'=>'news'],function(){
		Route::get('/active/{id?}',['as' => 'news.active','uses' => 'NewsController@active']);
	});

	Route::resource('news','NewsController');


	Route::group(['prefix'=>'bill'],function(){
		Route::get('/status/{id?}',['as' => 'bill.status','uses' => 'BillController@status']);
		Route::get('/search',['as' => 'bill.search','uses' => 'BillController@search']);
	});
	Route::resource('bill','BillController');

	Route::group(['prefix'=>'user'],function(){
		Route::get('/active/{id?}',['as' => 'user.active','uses' => 'UserController@active']);
	});
	Route::resource('user','UserController');

});
	
});



Route::group(['namespace' =>'Frontend'],function(){

	Route::get('trang-chu',['as'=>'frontend.home','uses' => 'HomeController@index']);

	Route::get('dang-nhap',['as'=>'frontend.login','uses'=>'UserController@logIn']);
	Route::post('dang-nhap',['as'=>'frontend.login','uses'=>'UserController@postLogIn']);

	Route::get('dang-xuat',['as'=>'frontend.logout','uses'=>'UserController@logOut']);

	Route::get('dang-ky','UserController@signUp')->name('frontend.signup');
    Route::post('dang-ky','UserController@postSignUp')->name('frontend.signup');

    Route::get('quen-mat-khau','UserController@resetPassword')->name('frontend.resetPassword');
    Route::post('quen-mat-khau','UserController@postResetPassword')->name('frontend.resetPassword');

    Route::get('cap-nhap-mat-khau','UserController@updatePassword')->name('frontend.password.update');
    Route::post('cap-nhap-mat-khau','UserController@postUpdatePassword')->name('frontend.password.update');

    Route::get('them-gio-hang/{id?}','ProductController@addCart')->name('frontend.addcart');
    Route::get('xoa-san-pham-gio-hang/{id}','ProductController@deleteItemCart')->name('frontend.cart.delete');
    
    Route::get('gio-hang','ProductController@getCart')->name('frontend.cart');
    Route::get('xoa-gio-hang','ProductController@deleteCart')->name('frontend.deleteCart');

    Route::get('cap-nhap-gio-hang','ProductController@updateCart')->name('frontend.updateCart');
    
    Route::get('xoa-san-pham-trong-gio-hang','ProductController@deleteItemCartAjax')->name('frontend.deleteItemCart');

   Route::get('thanh-toan',['as'=>'frontend.getCheckOut','uses'=>'ProductController@getCheckOut']);
   Route::post('thanh-toan',['as'=>'frontend.postCheckOut','uses'=>'ProductController@postCheckOut']);


   Route::get('tim-kiem','ProductController@getSearch')->name('frontend.getSearch');

   Route::get('thuong-hieu/{id?}',['as'=>'frontend.getSearchBrand','uses'=>'ProductController@getSearchBrand']);


   Route::get('gui-mail',['as'=>'frontend.sendMail','uses'=>'ProductController@sendMail']);

   

   Route::get("thong-bao",['as'=>'frontend.notification','uses'=>'HomeController@notification']);

   Route::get("tai-khoan",['as'=>'frontend.userProfile','uses'=>'UserController@getUserProfile']);

   Route::post("tai-khoan",['as'=>'frontend.userProfile','uses'=>'UserController@postUserProfile']);

   Route::post("doi-mat-khau",['as'=>'frontend.userPassword','uses'=>'UserController@postUserChangePassword']);

   Route::get("don-hang",['as'=>'frontend.userBill','uses'=>'UserController@getUserBill']);


   Route::get("chi-tiet-don-hang/{id?}",['as'=>'frontend.billDetail','uses'=>'BillController@getBill']);

   Route::get("tin-tuc",['as'=>'frontend.news','uses'=>'NewsController@index']);

   Route::get("tin-tuc/{id?}",['as'=>'frontend.newsDetail','uses'=>'NewsController@getNews']);
   

   Route::get('loc-san-pham','ProductController@filter');

   Route::get('{category}','CategoryController@index')->name('frontend.category');

   Route::get('san-pham/{product?}','ProductController@index')->name('frontend.product');

   Route::get('{category}/{producer}','CategoryController@producer')->name('frontend.category.producer');


});
