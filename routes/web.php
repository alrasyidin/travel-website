<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')
       ->name('home');
Route::get('/detail/{slug}', 'DetailController@index')
       ->name('detail');

Route::get('/checkout/{id}', 'CheckoutController@index')
       ->name('checkout')
       ->middleware(['auth', 'verified']);
       
Route::post('/checkout/{id}', 'CheckoutController@process')
       ->name('checkout_process')
       ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
       ->name('checkout-create')
       ->middleware(['auth', 'verified']);

Route::get('/checkout/create/{detail_id}', 'CheckoutController@remove')
       ->name('checkout-remove')
       ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
       ->name('checkout-success')
       ->middleware(['auth', 'verified']);

Route::prefix('manage')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes(['verify' => true]);

Route::post('/midtrans/callback', 'MidtransController@notificationHandler');
Route::get('/midtrans/finish', 'MidtransController@finishRedirect');
Route::get('/midtrans/unfinish', 'MidtransController@unfinishRedirect');
Route::get('/midtrans/error', 'MidtransController@errorRedirect');