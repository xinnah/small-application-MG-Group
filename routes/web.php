<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/','HomePageController@index');


// Route::get('/category', function () {
//     return view('category.index');
// });

Route::get('/',function(){
	return redirect('/login');
});
Auth::routes();



Route::group(['middleware' =>'auth'], function(){

	Route::get('/dashboard', function () {
	    return view('dashboard.index');
	});

	Route::get('/dashboard', 'DashboardController@index');
	//product 
	Route::resource('/products', 'ProductsController');
	//product category
	Route::resource('/product-category', 'ProductCategoryController');
	

	/*======= My profile =====*/
	Route::resource('/my-profile', 'MyProfileController');
	Route::get('/change-my-password', 'MyProfileController@viewPassword');
	Route::post('/change-my-password', 'MyProfileController@changeMyPassword');

	// logout
	Route::get('/logout', 'Auth\LoginController@logout');

});
