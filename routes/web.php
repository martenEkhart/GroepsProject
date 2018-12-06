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

Route::get('/', 'PagesController@getIndex')->name('HOME');
Route::get('/contact', 'PagesController@getContact');
Route::get('/producten', 'PagesController@getProducten');
Route::get('/klant', 'PagesController@getKlant');
Route::get('admin/index', 'PagesController@getAdmin');



// Route::get('product', 'PagesController@getProduct');
Route::resource('product', 'ProductsController');
Route::resource('category', 'CategoriesController');
Route::resource('customer', 'CustomersController');




Route::get('/payment/{order_id}', 'PaymentsController@preparePayment');
Route::name('webhooks.mollie')->post('webhooks/mollie', 'PaymentsController@handle');
Route::get('order/succes/', 'PaymentsController@handle')->name('order.success');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

