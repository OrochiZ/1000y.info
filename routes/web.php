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


$this->get('/', 'PagesController@root')->name('root');

// Auth::routes();
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::get('/home', 'HomeController@index')->name('home');

$this->resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
$this->resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
$this->get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
$this->resource('categories', 'CategoriesController', ['only' => ['show']]);

$this->post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
$this->resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

$this->resource('notifications', 'NotificationsController', ['only' => ['index']]);

$this->get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');

// 针对客户端的固定链接
$this->get('download.html', 'PagesController@download')->name('download');
$this->get('account.html', 'PagesController@account')->name('account');

// 游戏数据库
$this->get('sdb/{name}', 'SdbController@index')->name('sdb.index');
$this->get('sdb/{name}/{id}', 'SdbController@show')->name('sdb.show');
