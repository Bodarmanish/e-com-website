<?php



Route::get('/', function () {
    return view('welcome');
});


Route::match(['get','post'],'admin','admincontroller@login')->name('admin');
//admin routes
Route::group(['middleware'=> ['auth']],function(){

	Route::get('admin/dashboard','admincontroller@dashboard');
	Route::get('/admin/settings','admincontroller@settings');
	Route::get('/admin/chkpass','admincontroller@chkpassword');
	Route::match(['get','post'],'/admin/updatepass','admincontroller@updatepassword');

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
