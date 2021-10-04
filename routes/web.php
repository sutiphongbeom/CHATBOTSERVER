<?php

use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
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



Auth::routes(['verify' => true]);
Route::get('/', [Controller::class, 'Home'])->name('home');
Route::group(['middleware' => ['isstore','verified']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('isstore');
});