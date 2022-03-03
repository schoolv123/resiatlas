<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\RouteController;
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

Route::get('/login', [RouteController::class, 'index']);
Route::get('/', [RouteController::class, 'Dashboard']);
Route::get('/dashboard', [RouteController::class, 'Dashboard']);

//static page part
Route::prefix('staticpage')->group(function () {
    Route::get('/{pagename}', [RouteController::class, 'Staticpage']);
    Route::post('/{pagename}', [ActionController::class, 'StaticPageData']);
});

//faq part

Route::get('/faq', [RouteController::class, 'FAQpage']);
