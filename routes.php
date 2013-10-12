<?php
Route::get('stars/all', array('as' => 'all', 'uses' => 'StarsController@all'));
Route::get('stars/search', array('as' => 'search', 'uses' => 'StarsController@search'));
Route::put('services/{id}/savepivot', array('as' => 'savepivot', 'uses' => 'ServsController@savepivot'));
Route::get('highscore/spelname/{id}', array('as' => 'spelname', 'uses' => 'GamescoresController@spelname'));
Route::get('productorders/pivotJSON', array('as' => 'pivotJSON', 'uses' => 'PivottablesController@pivotJSON'));
Route::get('productorders/notpaid', array('as' => 'notpaid', 'uses' => 'PivottablesController@notpaid'));
Route::get('users/{id}/editproduct', array('as' => 'editpivot', 'uses' => 'UsersController@editpivot'));
Route::put('users/{id}/updatepivot', array('as' => 'updatepivot', 'uses' => 'UsersController@updatepivot'));
Route::get('deadline', array('as' => 'deadline', 'uses' => 'ServiceordersController@deadline'));




Route::resource('services', 'ServsController');
Route::resource('stars', 'StarsController');
Route::resource('serviceorders', 'ServiceordersController');
Route::resource('users', 'UsersController');
Route::resource('highscore', 'GamescoresController');
Route::resource('productorders', 'PivottablesController');
Route::resource('products', 'ProductsController');
Route::resource('posts', 'PostsController');
Route::resource('en/posts', 'EnpostsController');
Route::resource('posts', 'PostsController');
Route::resource('sv/posts', 'PostsController');
Route::group(array('before' => 'guest'), function(){
	
	
	Route::get('login', array('as' => 'login', 'uses' => 'AuthController@login'));
	Route::post('login', array('as' => 'postlogin', 'uses' => 'AuthController@postlogin'));
	
}

);




Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));
	Route::resource('logged_in', 'AuthController@logged_in');
	

		


});



Route::resource('portfolios', 'PortfoliosController');



