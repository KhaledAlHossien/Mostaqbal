<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SideBarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


//Route::get('/', function () {
//    return "zz";
//});


// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/showProduct/{id}', [HomeController::class, 'showProduct']);
Route::get('/showProject/{id}', [HomeController::class, 'showProject']);

// Allow Public Access to Show Pages
//Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
//Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Protect Other Routes with Authentication
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");

    // Product Routes (excluding show)
    Route::resource('products', ProductController::class);

    // Project Routes (excluding show)
    Route::resource('projects', ProjectController::class);

    // User Routes
    Route::resource('users', UserController::class);


    // Sidebar Routes
    Route::resource('sidebar', SideBarController::class);
});

// Authentication Routes
Auth::routes();

