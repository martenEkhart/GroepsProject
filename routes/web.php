<?php

use App\Category;

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
Route::get('category', 'PagesController@getCategory');
// Route::get('/klant', 'PagesController@getSearch');
Route::resource('product', 'ProductsController');
Route::resource('category', 'CategoriesController');

Route::get('/payment/{id}', 'PaymentsController@preparePayment');
// Route::post('/payment', 'PaymentConroller@preparePayment');
// Route::get('webhooks/mollie/{id}', 'PaymentController@testPayment')->name('webhooks.mollie');
// Route::post('webhooks/mollie/{id}', 'PaymentController@testPayment')->name('webhooks.mollie.callback');

Route::name('webhooks.mollie')->post('webhooks/mollie', 'PaymentsController@handle');
Route::get('order/succes/', 'PaymentsController@handle')->name('order.success');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Route::any('pages/klant',function(){
//     $q = Input::get ( 'q' );
//     $category = Category::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
//     if(count($category) > 0)
//         return view('pages/klant')->withDetails($category)->withQuery ( $q );
//     else return view ('pages/klant')->withMessage('No Details found. Try to search again !');
// });