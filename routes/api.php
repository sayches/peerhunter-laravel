<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group([
  'middleware' => 'auth:api'
], function() {
    Route::get('logout', 'Api\UserController@logout');
});

Route::group([], function () {
    Route::post('verify-number', 'Api\UserController@verifyNumber');
    Route::post('otp-verification', 'Api\UserController@verifyOtp');
    Route::post('update-profile', 'Api\UserController@updateProfile');
    Route::post('update-image', 'Api\UserController@uploadImage');
    Route::post('visibility-status', 'Api\UserController@updateVisibilityStatus');
    Route::get('users', 'Api\UserController@nearByUsers');
    Route::get('user-data', 'Api\UserController@userData');
    Route::post('add-offer', 'Api\OfferController@createOffer');
    Route::get('offers', 'Api\OfferController@offers');
    Route::get('user-detail/{id}', 'Api\UserController@userDetail');
    Route::get('received-offers', 'Api\OfferController@receivedOffers');
    Route::post('accept-offer', 'Api\OfferController@acceptOffer');
    Route::post('reject-offer', 'Api\OfferController@rejectOffer');
    Route::post('withdraw-offer', 'Api\OfferController@withdrawOffer');
    Route::post('rate-user', 'Api\UserController@rateUser');
    Route::get('mark-online', 'Api\UserController@markOnline');
    Route::get('mark-offline', 'Api\UserController@markOffline');
    Route::get('delete-user', 'Api\UserController@deleteUser');

    Route::post('report-user', 'Api\ReportController@report');
    //Route::get('logout', 'Api\UserController@logout');
});

    



