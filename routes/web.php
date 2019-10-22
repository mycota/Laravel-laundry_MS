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

Route::get('/', function () {return view('auth.login'); });

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', function(){
// 	return 'You are admin';
// })->middleware(['auth', 'auth.admin']);

// Route::resource('/users', 'Admin\UserController', ['except'=>['show', 'create', 'store']]);


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::get('/users/{id}/edituser', 'UserController@edituser')->name('users.edituser');
	
	Route::post('/users/{id}', 'UserController@updateuser')->name('users.updateuser');

	Route::resource('/users', 'UserController', ['except'=>['create', 'show', 'updateprofile']]);
});

Route::resource('/profile', 'UserProfileController')->middleware('auth');


Route::resource('/customers', 'CustomersController')->middleware('auth');
Route::resource('/cloths', 'ClothsController')->middleware(['auth', 'auth.admin']);
Route::resource('/wmachines', 'MachinesController')->middleware(['auth', 'auth.admin']);
Route::resource('/orders', 'OrderDetailsController')->middleware(['auth']);
Route::resource('/payments', 'PaymentsController')->middleware(['auth']);
Route::resource('/orders_sumry', 'OrdersController')->middleware(['auth']);
Route::resource('/auth/passwords', 'Auth\ChangePasswordController')->middleware(['auth']);




