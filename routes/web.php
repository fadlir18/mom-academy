<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('login');
// })->middleware(['checklogin']);
  
// // Auth::routes();
// Route::prefix('home')->middleware(['checklogin'])->group(function () {
//     Route::get('/', 'HomeController@index');
// });

// -- LANDING
Route::group(['as' => 'landing.'], function () {
    Route::get('/','HomeController@index')->name('index'); // BASE URL
    Route::get('/home','HomeController@index')->name('home');
});

Route::post('login', 'LoginController@index'); // Login
Route::post('register', 'LoginController@register'); //Register
Route::get('logout', 'LoginController@logout'); //Register
// about us
Route::group(['prefix' => 'about-us'], function () {
    Route::get('/', 'AboutController@index');    
});

// article
Route::group(['prefix' => 'articles'], function () {
    Route::get('/', 'ArticleController@index');
    Route::get('/detail/{id}', 'ArticleController@detail');
});

// class
Route::group(['prefix' => 'class'], function () {
    Route::get('/', 'ClassController@index');
    Route::get('/detail/{slug}', 'ClassController@detail');
    Route::get('/detail-video/{slug}', 'ClassController@detailvideo');
});

// Contacts
Route::post('/contact-sendEmail', 'HomeController@sendMail')->name('sendMail');

// Route::post('/contact-form', [ContactController::class, 'contactForm'])->name('contact-form');
// Route::get('/contact-form', [ContactController::class, 'storeContactForm'])->name('contact-form.store');


// scolarship
Route::group(['prefix' => 'class/scolarship'], function () {
    Route::get('/', 'ClassController@indexScolarship');
});

// expert
Route::group(['prefix' => 'class/expert'], function () {
    Route::get('/', 'ClassController@indexExpert');
});

// get income
Route::group(['prefix' => 'get-income'], function () {
    Route::get('/', 'IncomeController@index');    
    Route::post('/register', 'IncomeController@register');    
});

// events
Route::group(['prefix' => 'events'], function () {
    Route::get('/', 'EventsController@index');    
    Route::get('/detail/{id}', 'EventsController@detail');
});

// market day
Route::group(['prefix' => 'market-day'], function () {
    Route::get('/', 'MarketController@index');    
    Route::get('/detail/{id}', 'MarketController@detail');

});
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//google
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
//facebook
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::resource('orders', OrderController::class)->only(['index', 'show']);
Route::get('payment/module_ebook/{id}', 'PaymentController@indexEbook');
Route::get('payment/event/{id}', 'PaymentController@indexEvent');
Route::get('payment/course/{id}', 'PaymentController@indexCourse');
Route::get('payment/module_video/{id}', 'PaymentController@indexVideo');
Route::get('payment/confirm', 'PaymentController@payment')->name('payment');
Route::get('payment/status/trx_id/{id}', 'PaymentController@payment_status');
Route::post('payment/status/trx_id/{id}', 'PaymentController@payment_paid');
Route::post('payment/confirm', 'PaymentController@payment_post');

  
// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
