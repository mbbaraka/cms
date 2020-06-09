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

Auth::routes();

Route::get('/', 'WebController@index')->name('index');
Route::get('category/{slug}', 'WebController@category')->name('category');
Route::get('news.html', 'WebController@newsPage')->name('news');
Route::get('news/{slug}.html', 'WebController@news')->name('post');
Route::get('pages/{title}/{slug}.html', 'WebController@pages')->name('page');
Route::get('core-values.html', 'WebController@coreValues')->name('core-values');
Route::get('core-values.htm', 'WebController@coreValues')->name('core-values');
Route::get('contact.html', 'WebController@showContactForm')->name('contact.show');
Route::post('contact.html', 'WebController@submitContactForm')->name('contact.submit');
Route::get('churches.html', 'WebController@churches')->name('church');
Route::get('churches/{slug}.html', 'WebController@churchPage')->name('churches');
Route::get('events.html', 'WebController@events')->name('events');
Route::get('events/{slug}.html', 'WebController@event')->name('event');
Route::get('galleries.html', 'WebController@galleries')->name('galleries');
Route::get('sermons.html', 'WebController@sermons')->name('sermons');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'WebController@autocomplete'));
Route::resource('comments', 'CommentController');
Route::post('subscribe', 'WebController@subscribe')->name('subscribe.submit');
Route::get('subscribed.html', 'WebController@subscribed')->name('subscribed');
//Route::put('comments.activate', 'CommentController@activate')->name('comments.activate');
//Admin routes
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');
    Route::resource('pages', 'PageController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('banners', 'BannerController');
    Route::resource('sermons', 'SermonController');
    Route::resource('events', 'EventsController');
    Route::resource('churches', 'ChurchController');
    Route::resource('settings', 'SettingController');
    Route::resource('filemanager', 'FileController');
    Route::resource('users', 'UsersController');
    Route::resource('account', 'AccountController');
    Route::resource('subscribers', 'SubscriberController');
});

//For the file manager

 Route::group(['prefix' => 'admin/files', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
