<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/logout', function () {
    session()->forget('BLOG_USER_ID');
    return redirect('admin/login');
});

Route::view('front/layout','front/layout/layout');
Route::view('/','front/home');
Route::view('front/post/{id}','front/post');

Route::get('front/home','front\post@home');


Route::view('/admin/login','admin.login');
Route::post('/login_submit','Admin_auth@login_submit');


Route::view('/layout','admin.layout.layout');


Route::group(['middleware'=>['auth_admin']],function(){

Route::get('/admin/post/list','admin\Post@listing');
Route::get('/admin/post/delete/{id}','admin\Post@delete');
Route::get('/admin/post/edit/{id}','admin\Post@edit');
Route::post('/admin/post/update/{id}','admin\Post@update');
Route::post('/admin/post/add/','admin\Post@submit')->name('postAdd');
Route::view('/admin/post/add','admin.post.add');


Route::get('/admin/page/list','admin\page@listing');
Route::view('/admin/page/add','admin\page\add');
Route::post('/admin/page/submit','admin\page@submit');
Route::get('/admin/page/delete/{id}','admin\page@delete');
Route::get('/admin/page/edit/{id}','admin\page@edit');
Route::post('/admin/page/update/{id}','admin\page@update');

Route::get('/admin/contact/list','admin\contact@listing' );
Route::view('/admin/contact/add','admin\contact\add' );
Route::post('/admin/contact/submit','admin\contact@submit' );
Route::get('/admin/contact/delete/{id}','admin\contact@delete' );
Route::get('/admin/contact/edit/{id}','admin\contact@edit' );
Route::post('/admin/contact/update/{id}','admin\contact@update' );
});









 

