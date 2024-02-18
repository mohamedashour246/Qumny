<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\SlidersController;
use App\Http\Controllers\Site\ProductsController;
use App\Http\Controllers\Site\MembersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('register',[AuthController::class,'register'])->name('register');

Route::post('register',[AuthController::class,'postRegister'])->name('register.post');

Route::get('/',[AuthController::class,'getLogin'])->name('login');

Route::post('login/post',[AuthController::class,'postLogin'])->name('site.login.post');

    Route::group(['middleware' => 'auth' ] , function () {

        Route::group(['middleware' => 'active'] , function () {

            Route::get('/main',[AuthController::class,'main'])->name('main');

            Route::get('logout',[AuthController::class,'getLogout'])->name('users.logout');

            Route::get('home',[AuthController::class,'home'])->name('home');

            Route::get('contactUs',[AuthController::class,'home'])->name('user.contactUs');

            Route::get('sliders',[SlidersController::class,'getSliders'])->name('sliders');

            Route::post('sliders/post',[SlidersController::class,'postSliders'])->name('sliders.post');

            Route::post('sliders/update',[SlidersController::class,'updateSliders'])->name('sliders.update');

            Route::post('sliders/delete',[SlidersController::class,'deleteSliders'])->name('sliders.delete');

            Route::get('products',[ProductsController::class,'getProducts'])->name('products');

            Route::post('products/post',[ProductsController::class,'postProducts'])->name('products.post');

            Route::post('products/update',[ProductsController::class,'updateProducts'])->name('products.update');

            Route::post('products/delete',[ProductsController::class,'deleteProducts'])->name('products.delete');

            Route::get('store',[MembersController::class,'getStore'])->name('store');

            Route::get('profile',[MembersController::class,'getProfile'])->name('user.profile');

            Route::get('joins',[MembersController::class,'getJoins'])->name('joins');


        });
    });

    Route::group(['prefix' => 'admin'], function () {

        Route::get('login',[DashboardController::class,'getLogin'])->name('admin.login');

        Route::post('login/post',[DashboardController::class,'postLogin'])->name('admin.login.post');

        Route::group(['middleware' => 'auth'], function () {

            Route::group(['middleware' => 'active'] , function () {

                  Route::group(['middleware' => 'provider'] , function () {

                      Route::get('dashboard',[DashboardController::class,'getDashboard'])->name('dashboard');

                      Route::get('logout',[DashboardController::class,'getLogout'])->name('admin.logout');

                      Route::get('users',[MembersController::class,'getUsers'])->name('users');

                      Route::post('users/post',[MembersController::class,'postUsers'])->name('users.post');

                      Route::post('users/update',[MembersController::class,'updateUsers'])->name('users.update');

                      Route::post('users/delete',[MembersController::class,'deleteUsers'])->name('users.delete');

                      Route::get('products',[ProductController::class,'getProducts'])->name('admin.products');

                      Route::post('products/post',[ProductController::class,'postProducts'])->name('admin.products.post');

                      Route::post('products/update',[ProductController::class,'updateProducts'])->name('admin.products.update');

                      Route::post('products/delete',[ProductController::class,'deleteProducts'])->name('admin.products.delete');

                  });
            });
        });
    });
