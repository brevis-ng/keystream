<?php

use Illuminate\Support\Facades\Route;
use Hexters\Ladmin\Routes\Ladmin;
use App\Http\Controllers\LinkStreamController;
use App\Http\Controllers\PlayStreamController;

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

Route::group(['prefix' => 'embed', 'middleware' => 'myframe'], function() {
    Route::get('/{uuid}', PlayStreamController::class)->name('playstream');
});

Ladmin::route(function() {

    Route::group(['as' => 'links.', 'prefix' => 'links'], function() {
        Route::resource('/stream', LinkStreamController::class);
    });

});
