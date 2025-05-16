<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/home', function () {
//     return redirect()->route('allEmployee');
// })->name('home');


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'loginForm')->name('loginForm');
    Route::post('login', 'login')->name('createLogin');
});

Route::controller(UserController::class)->middleware(['auth', 'IsAdmin'])->group(function () {

    Route::get('employees', 'all')->name('allEmployee');
    Route::get('employees/show/{id}', 'show')->name('showEmployee');

    //create
    Route::get('employees/create', 'create')->name('createEmployee');
    Route::post('employees', 'store')->name('storeEmployee');

    //update
    Route::get('employees/edit/{id}', 'edite')->name('editeEmployee');
    Route::put('employees/update/{id}', 'update')->name('updateEmployee');


    //delete
    Route::delete('employees/{id}', 'delete')->name('deleteEmployee');
});


Route::controller(CustomerController::class)->middleware(['auth'])->group(function () {

    Route::get('customers', 'all')->name('allCustomer');
    Route::get('customers/show/{id}', 'show')->name('showCustomer');

    //create
    Route::get('customers/create', 'create')->name('createCustomer');
    Route::post('customers', 'store')->name('storeCustomer');

    //update
    Route::get('customers/edit/{id}', 'edite')->name('editeCustomer');
    Route::put('customers/update/{id}', 'update')->name('updateCustomer');


    //delete
    Route::delete('customers/{id}', 'delete')->name('deleteCustomer');
});


use App\Http\Controllers\ActionController;

Route::controller(ActionController::class)->middleware(['auth'])->group(function () {

    Route::get('actions', 'all')->name('allAction');
    Route::get('actions/show/{id}', 'show')->name('showAction');

    // // create
    Route::get('actions/create', 'create')->name('createAction');
    Route::post('actions', 'store')->name('storeAction');

    // // update
    Route::get('actions/edit/{id}', 'edit')->name('editAction');
    Route::put('actions/update/{id}', 'update')->name('updateAction');

    // // delete
    Route::delete('actions/{id}', 'delete')->name('deleteAction');
});
