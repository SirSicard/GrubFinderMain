<?php

use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CountiesController;
use App\Http\Controllers\Backend\LocationsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RestaurantsController;
use App\Http\Controllers\Backend\StatusesController;
use App\Http\Controllers\Frontend\BusinessesController;
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
//landing page

//see all restaurants in one place, list of restaurants
Route::get('/', [BusinessesController::class, 'index'])->name('home');
Route::get('restaurant/{restaurant}', [BusinessesController::class, 'showRestaurant'])->name('show');
//Route::get('/add', [BusinessesController::class, 'add']);

//see most recently added restaurants,  list of restaurants



//see all restaurants in a county,  list of restaurants
Route::get('counties/{county}/restaurants', [CountiesController::class, 'restaurants'])->name('county.restaurants');


//see all restaurants under a category and location,  list of restaurants
Route::post('filter',
    [BusinessesController::class, 'filter'])->name('filter');


//submit suggestions for new restaurants, form to submit data
Route::get('add', [BusinessesController::class, 'addRestaurant'])->name('add');
Route::post('add', [BusinessesController::class, 'storeRestaurant']);



//register get and post routes
Route::get('/register', [UsersController::class, 'create'])->name('register');
Route::post('/register', [UsersController::class, 'store']);
//Login get and post routes
Route::get('/login', [UsersController::class, 'index'])->name('login');
Route::post('/login', [UsersController::class, 'login']);
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');






//all the admin stuff is located inside /backednd prefix
Route::middleware(['auth'])->name('backend.')->group(function(){
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('categories', CategoriesController::class);
    Route::resource('counties', CountiesController::class);
    Route::put('locations/{location}', [LocationsController::class,'update'])->name('updatelocation');
    Route::resource('counties.locations', LocationsController::class)->except([
        'update'
    ]);
    Route::resource('statuses', StatusesController::class);
    Route::post('restaurants/{restaurant}/link', [RestaurantsController::class, 'createLink'])->name('restaurants.link');
    Route::delete('linkdelete',[RestaurantsController::class, 'linkDelete'] )->name('linkDelete');
    Route::resource('restaurants', RestaurantsController::class);

});


