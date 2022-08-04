<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    UserController,
    CategoryController,
    MerchandiseController,
    AuthenticatedUserController,
    AdminController
};

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



            Route::get('/', [HomeController::class, 'index'])->name('index');

            Route::get('/produto/{id}', [HomeController::class, 'produto'])->name('front.produto');

            Auth::routes(); // Login, Register, Logout

            Route::middleware('auth')->group(function () {



            Route::prefix('admin')->name('admin.')->middleware('auth.admin')->group(function () {

            Route::get('/', [AdminController::class, 'index'])->name('index');

            Route::resource('merchandises', MerchandiseController::class);



            Route::resource('categories', CategoryController::class);


            Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{id}', [UserController::class, 'show'])->name('show');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('update');

            
        });
    });
});
