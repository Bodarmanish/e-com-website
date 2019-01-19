<?php



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//admin routes
Route::match(['get','post'],'admin','admincontroller@login')->name('admin');

Route::group(['middleware'=> ['auth']],function(){

	Route::get('admin/dashboard','admincontroller@dashboard');
	Route::get('/admin/settings','admincontroller@settings');
	Route::get('/admin/chkpass','admincontroller@chkpassword');
	Route::match(['get','post'],'/admin/updatepass','admincontroller@updatepassword');

//category route(admin)
	Route::match(['get','post'],'admin/addcategory','Categorycontroller@addcategory');
	Route::match(['get','post'],'/admin/editcategory/{id}','Categorycontroller@editcategory');
	Route::match(['get','post'],'/admin/deletecategory/{id}','Categorycontroller@deletecategory');
	Route::get('admin/viewcategories','Categorycontroller@viewcategories');

//product route
	Route::match(['get','post'],'/admin/addproduct','productscontroller@addproduct');
	Route::match(['get','post'],'/admin/editproduct/{id}','productscontroller@editproduct');
	Route::get('/admin/viewproduct','productscontroller@viewproduct');
	Route::get('/admin/delproductimage/{id}','productscontroller@delproductimage');
	Route::get('/admin/deleteproduct/{id}','productscontroller@deleteproduct');

});


//forgotpassword routes
Route::group(['middleware' => 'web','prefix' => 'password'], function () 
			{   
				
				Route::get('forgotpwd','PasswordResetController@forgotpwd')->name('forgotpwd');
				Route::get('/createpwd/{token}','PasswordResetController@find')->name('createpwd');
				Route::get('/resetform/{token}','PasswordResetController@showResetForm')->name('resetform');
			    Route::post('create/', 'PasswordResetController@create')->name('create');
			    Route::post('pwdreset', 'PasswordResetController@pwdreset')->name('pwdreset');
			    
			});	

Route::get('/logout','admincontroller@logout');





