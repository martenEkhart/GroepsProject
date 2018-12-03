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

Route::get('/', 'PagesController@getIndex');
Route::get('/contact', 'PagesController@getContact');
Route::get('/producten', 'PagesController@getProducten');
Route::get('/klant', 'PagesController@getKlant');

Route::resource('product', 'ProductsController');
Route::resource('category', 'CategoriesController');

Route::get('/payment', 'PaymentController@preparePayment');
// Route::post('/payment', 'PaymentConroller@preparePayment');
// Route::get('webhooks/mollie/{id}', 'PaymentController@testPayment')->name('webhooks.mollie');
// Route::post('webhooks/mollie/{id}', 'PaymentController@testPayment')->name('webhooks.mollie.callback');

Route::name('webhooks.mollie')->post('webhooks/mollie', 'PaymentController@handle');
Route::get('order/succes/', 'PaymentController@handle')->name('order.success');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
