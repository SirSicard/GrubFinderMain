<?php

use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\Backend\DashboardController;
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
    return view('welcome');
});

//Login get and post routes
Route::get('/login', [UsersController::class, 'index'])->name('login');
//Route::post('/login', [UsersController::class, 'store']);
//register get and post routes
Route::get('/register', [UsersController::class, 'create'])->name('register');
Route::post('/register', [UsersController::class, 'store']);

//all the admin stuff is located inside /backednd prefix
Route::middleware(['web'])->name('backend.')->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
});


