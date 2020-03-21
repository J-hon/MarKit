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

Route::group(['middleware' => ['web']], function() {

    // Home routes
    Route::get('/', 'PagesController@index')->name('home');

    //Authentication routes
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    // Registration Routes
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    //Password Routes
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/{product}', 'ProductController@show')->name('show');

    Route::prefix('admin')->group(function () {

        // Admin routes
        Route::get('/admin', 'ProductController@index')->name('admin.index');

        Route::get('/market', 'PagesController@allmarket')->name('market');
        Route::get('/product', 'PagesController@allproduct')->name('product');
        Route::get('/price', 'PagesController@allprice')->name('price');

        // Product routes
        Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/store-product', 'ProductController@store')->name('product.store');
        Route::post('/{product}/update-product', 'ProductController@update')->name('product.update');
        Route::post('/{id}/delete-product', 'ProductController@destroy')->name('product.delete');

        // Market routes
        Route::get('/market/edit/{id}', 'MarketController@edit')->name('market.edit');
        Route::post('/store-market', 'MarketController@store')->name('market.store');
        Route::post('/{market}/update-market', 'MarketController@update')->name('market.update');
        Route::post('/{id}/delete-market', 'MarketController@destroy')->name('market.delete');

        // Price routes
        Route::get('/price/edit/{id}', 'MarketPriceController@edit')->name('price.edit');
        Route::post('/store-price', 'MarketPriceController@store')->name('price.store');
        Route::post('/update-price/{price}', 'MarketPriceController@update')->name('price.update');
        Route::post('/{id}/delete-price', 'MarketPriceController@destroy')->name('price.delete');

        Route::get('/product/add-product', 'ProductController@create')->name('product.add');
        Route::get('/market/add-market', 'MarketController@create')->name('market.add');
        Route::get('/price/add-price', 'MarketPriceController@create')->name('market-price.add');

    });
});
