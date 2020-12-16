<?php

use Illuminate\Support\Facades\Auth;
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
});

Auth::routes(['register' => false]);



Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
    Route::get('/dashboard' , 'DashboardController@index')->name('dashboard');
    Route::get('/profile' , 'DashboardController@profile')->name('profile');
    Route::resource('invoices', 'InvoiceController');
    Route::resource('customers', 'CustomerController');
    Route::get('/section/{id}', 'InvoiceController@getProducts');
    Route::resource('sections', 'SectionController');
    Route::resource('products', 'ProductController');


});

