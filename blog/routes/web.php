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

Route::get('/welcome', function () {
		$first='Kajol';
		$last='Rauniyar';
 	/*	$full=$first." ".$last;
 		return view ('welcome')->with("fullname",$full);*///one method to pass the data 
 		$fullname=$first ." ". $last;
 		$email='rauniyarkajol2608@gmail.com';
 		$data=[];
 		$data['email']=$email;
 		$data['fullname']=$fullname;
 		return view ('/welcome')->withData($data);
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/contact', function(){
	return view('contact');
});
Route::get('/about',function(){
	return view('about');
});

Route::resource('posts','PostController');



