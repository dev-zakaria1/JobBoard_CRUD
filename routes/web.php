<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\listings;
use Database\Factories\listingsFactory;

// Common Resource Route:
// index - show all listings;
// show - show single listing;
// create - show form to create new listing 
// store - store new listing 
// edit - show form to edit listing 
// update -update listing 
// destroy - delete listing


//-----listings
//All listing
Route::get('/', [ListingController::class, 'index'])->name('home.index');
//show register
Route::get('/register', [UserController::class, 'create'])->name('user.register')->middleware('guest');
//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
//store user
Route::post('/users/store', [UserController::class, 'store'])->name('user.store')->middleware('guest', 'throttle:5,1');

//log user out
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth', 'throttle:5,1');


Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate')->middleware('guest', 'throttle:5,1');
//show Listing
Route::get('/listing/show/{listing}', [ListingController::class, 'show'])->name("listing.show");
Route::prefix('/listing')->middleware('auth')->group(function () {
    //show create form
    Route::get('/create', [ListingController::class, 'create'])->name('listing.create');
    //manage listings
    Route::get('/manage', [ListingController::class, 'manage'])->name('listing.manage');
    //Store Listing Data 
    Route::post('/store', [ListingController::class, 'store'])->name('listing.store')->middleware('throttle:30,1');
    //show edit form
    Route::get('/edit/{listing}/', [ListingController::class, 'edit'])->name('listing.edit');
    //update form
    Route::put('/update/{listing}/', [ListingController::class, 'update'])->name('listing.update')->middleware('throttle:30,1');
    //delete form
    Route::delete('/delete/{listing}/', [ListingController::class, 'destroy'])->name('listing.destroy')->middleware('throttle:10,1');
    
});

