<?php

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
})->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['prefix' => 'applications'], function () {
        Route::get('/', 'App\Http\Livewire\Admin\Applications\Applications')->name('admin.applications');
        Route::get('/{application}', [\App\Http\Controllers\Admin\ApplicationController::class, 'view'])->name('admin.applications.view');
        Route::get('/{application}/edit', [\App\Http\Controllers\Admin\ApplicationController::class, 'edit'])->name('admin.applications.edit');
    });
});

Route::get('application/new', [\App\Http\Controllers\Frontend\ApplicationController::class, 'create'])->name('application.create');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
