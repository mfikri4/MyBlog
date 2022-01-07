<?php

use App\Http\Controllers\PortalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\MessagesController;
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


Route::get('/', [PortalController::class, 'index']);
Route::get('about', [PortalController::class, 'about']);
Route::get('contact', [PortalController::class, 'contact']);
Route::get('post', [PortalController::class, 'post']);
Route::get('post-detail/{id}', [PortalController::class, 'postDetail']);
Route::get('menu/{id}', [PortalController::class, 'menu']);
Route::get('category/{id}', [PortalController::class, 'category']);
Route::get('search', [PortalController::class, 'search']);
Route::prefix('comment')->group(function(){
    Route::post('/', [CommentController::class, 'insert']);
});
Route::prefix('contact')->group(function(){
    Route::post('/', [MessageController::class, 'insert']);
});

//Route Admin
Route::get('register', [AdminController::class, 'register']);
Route::post('register', [AdminController::class, 'postRegister']);
Route::get('login', [AdminController::class, 'login']);
Route::post('login', [AdminController::class, 'postLogin']);
Route::get('logout', [AdminController::class, 'logout']);

// Route Menu Admin
Route::middleware('checkAdmin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [AdminController::class, 'index']);
        
        Route::prefix('category')->group(function(){
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'insert']);
            Route::get('edit/{id}', [CategoryController::class, 'edit']);
            Route::post('edit/{id}', [CategoryController::class, 'update']);
            Route::get('delete/{id}', [CategoryController::class, 'delete']);
        });

        Route::prefix('post')->group(function(){
            Route::get('/', [PostController::class, 'index']);
            Route::get('create', [PostController::class, 'create']);
            Route::post('create', [PostController::class, 'insert']);
            Route::get('edit/{id}', [PostController::class, 'edit']);
            Route::post('edit/{id}', [PostController::class, 'update']);
            Route::get('delete/{id}', [PostController::class, 'delete']);
        });

        Route::prefix('sliders')->group(function(){
            Route::get('/', [SlidersController::class, 'index']);
            Route::get('create', [SlidersController::class, 'create']);
            Route::post('create', [SlidersController::class, 'insert']);
            Route::get('edit/{id}', [SlidersController::class, 'edit']);
            Route::post('edit/{id}', [SlidersController::class, 'update']);
            Route::get('delete/{id}', [SlidersController::class, 'delete']);
        });

        Route::prefix('mainmenu')->group(function(){
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'insert']);
            Route::get('edit/{id}', [CategoryController::class, 'edit']);
            Route::post('edit/{id}', [CategoryController::class, 'update']);
            Route::get('delete/{id}', [CategoryController::class, 'delete']);
        });

        Route::get('messages', [MessagesController::class, 'index']);

        Route::prefix('profile')->group(function(){
            Route::get('{id}', [AdminController::class, 'edit']);
            Route::post('{id}', [AdminController::class, 'update']);
        });

    });
});