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

Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/contact', 'PagesController@getContact');
Route::get('/producten', 'PagesController@getProducten');
Route::get('/productenTRaoul', 'PagesController@getProductenTRaoul');
Route::get('/klant', 'PagesController@getKlant');
Route::get('/', 'PagesController@getKlant');
Route::get('admin/index', 'PagesController@getAdmin');
Route::get('/search', 'ProductsController@search');

Route::get('/customisation/manage', 'CustomisationsController@dataToJavascript');
Route::post('/customisations/changedata', 'CustomisationsController@changeData');





// Route::get('product', 'PagesController@getProduct');
Route::resource('product', 'ProductsController');
Route::resource('category', 'CategoriesController');
Route::resource('customer', 'CustomersController');
Route::resource('customisation', 'CustomisationsController');
Route::resource('address', 'AddressesController');




Route::get('/payment/{order_id}/{amount}', 'PaymentsController@preparePayment');
Route::post('/payment/{order_id}/{amount}', 'PaymentsController@preparePayment');
Route::name('webhooks.mollie')->post('webhooks/mollie', 'PaymentsController@handle');
Route::get('order/succes/', 'PaymentsController@handle')->name('order.success');
Auth::routes();
Route::delete('cart/{cart_product_id}', 'CartsController@deleteFromCart');
Route::get('cart/{user_id}/add/{product_id}','CartsController@addToCart');
Route::get('cart/delete/{cart_product_id}','CartsController@removeFromCart');
Route::get('cart/empty/{cart_id}', 'CartsController@emptyCart');
Route::get('cart/{user_id}','CartsController@index');
Route::post('cart/changeamount/{cart_product_id}/{amount}','CartsController@changeAmount');
Route::post('cart/checkout/{user_id}/{cart_id}','CartsController@checkoutCart');
Route::get('cart/checkout/{user_id}/{cart_id}','CartsController@checkoutCart');
// Route::get('/home', 'HomeController@index')->name('home');
