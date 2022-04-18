<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\AdminRegisterController;
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

Route::controller(AuthenticateController::class)
    ->name('auth.')
    ->prefix('auth')
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
        Route::controller(AdminRegisterController::class)
            ->name('register.')
            ->group(function() {
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('store');
                Route::get('/edit', 'edit')->name('edit');
                Route::post('/edit', 'update')->name('update');
            });
    });

Route::middleware(['auth'])->group(function() {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Route::get('/', function() { return view('welcome'); });
