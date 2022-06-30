<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// All Listing
Route::get('/', [ListingController::class,
 'index'] );

 // Show Create Form
Route::get('/listings/create',
[ListingController::class, 'create'])->middleware('auth');

 // Store Data
Route::post('/listings',
[ListingController::class, 'store'])->middleware('auth');

Route::get('/foo', function () {
  Artisan::call('storage:link');
});

// Show Edit Form
Route::get('listings/{listing}/edit',
[ListingController::class, 'edit'])->middleware('auth');

//Submit to update
Route::put('listings/{listing}',
[ListingController::class, 'update'])->middleware('auth');

//Submit to delete
Route::delete('listings/{listing}',
[ListingController::class, 'destroy'])->middleware('auth');

//Listing Manage
Route::get('/listings/manage', 
[ListingController::class, 'manage'])
->middleware('auth');

  // Single Listing
Route::get('listings/{listing}',
[ListingController::class, 'show']);

//Show Register Form
Route::get('/register',
 [UserController::class, 'create'])->middleware('guest');

 //Create New User
 Route::post('/users',
 [UserController::class, 'store']);

 //Logout
 Route::post('/logout', 
[UserController::class, 'logout'])->middleware('auth');

//Show Log in Form
Route::get('/login',
 [UserController::class, 'login'])->name('login')->middleware('guest');

 //Login User
 Route::post('users/auth', [UserController::class, 'auth']);

// Common Resource Routes
// index - shows all the list
// show - show a single item
// create - Show the form to create new record
// store - Store the listing
// edit - show the form for edits
// update - update the selected listing
// destroy - delete the selected listing