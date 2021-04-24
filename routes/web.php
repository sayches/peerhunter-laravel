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
    return view('auth.login');
})->name('welcome');



Route::post('/query-submit', 'Admin\LeadController@addLead')->name('query.submit');

Auth::routes();

Route::get('/discord', 'HomeController@redirectToDiscord')->name('discord');

Route::post('/password/reset', 'Admin\DashboardController@resetPassword')->name('reset.password');

Route::get('/password/updated', function () {
    return view('auth.passwords.updated', compact($role));
});


Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function () {
    Route::get('/home', 'DashboardController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/user-count', 'DashboardController@usersData')->name('user-count');

    Route::match(['get', 'post'], '/users', 'DashboardController@users')->name('users');
    Route::get('/make/admin/{id}', 'DashboardController@makeAdmin')->name('make_admin');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::post('/profile/update', 'DashboardController@updateProfile')->name('profile.update');
    Route::post('/user/update-image', 'UserController@updateImage')->name('user.update-image');
    Route::post('update/password', 'DashboardController@updatePassword')->name('update.password');

    //Routes for users
    Route::get('/users', 'UserController@index')->name('users.all');
    Route::get('/unregistered-users', 'UserController@unregisteredUsers')->name('unregistered-users.all');
    Route::match(['get', 'post'], '/add/user', 'UserController@add')->name('user.add');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/update', 'UserController@update')->name('user.update');
    Route::post('/users/statusupdate', 'UserController@updateStatus');
    Route::get('/user/{id}/view', 'UserController@view')->name('user.view');
    Route::get('/user/{id}/delete', 'UserController@delete')->name('user.delete');

    //Routes for offers
    Route::get('/offers', 'OfferController@index')->name('offers.all');
    Route::get('/offer/{id}/view', 'OfferController@view')->name('offer.view');
    Route::get('/offer/{id}/delete', 'OfferController@delete')->name('offer.delete');

    //Routes for offers
    Route::get('/reports', 'ReportController@index')->name('reports.all');
    Route::post('/send-warning', 'ReportController@sendWarning')->name('send.warning');
    Route::get('/report/{id}/view', 'ReportController@viewReport')->name('report.view');
    Route::get('/report/{id}/block', 'ReportController@blockUser')->name('report.block');

});


Route::group(['namespace' => 'Admin'], function () {
    Route::get('privacy-policy', 'PageController@privacyPolicy')->name('get.privacy-policy');
    Route::get('terms-and-conditions', 'PageController@termsConditions')->name('get.terms-conditions');

    //Unsubscribe from mail notification
    Route::get('/unsubscribe-mail/{id}', 'UserController@unsubscribeMail')->name('unsubscribe-mail');
});



	
