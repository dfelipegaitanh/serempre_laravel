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

Auth::routes();

Route::get('email/verify',  [App\Http\Controllers\Auth\VerificationController::class , 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class  ,'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class ,'resend'])->name('verification.resend');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('cities', App\Http\Controllers\CityController::class);
    Route::post('/cities/busqueda', [App\Http\Controllers\CityController::class, 'busqueda'])->name('cities.busqueda');
    Route::get('/cities_clear', [App\Http\Controllers\CityController::class, 'clear'])->name('cities.index_clean');

    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::post('/clients/busqueda', [App\Http\Controllers\ClientController::class, 'busqueda'])->name('clients.busqueda');
    Route::get('/clients_clear', [App\Http\Controllers\ClientController::class, 'clear'])->name('clients.index_clean');
});
