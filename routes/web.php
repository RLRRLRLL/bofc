<?php

use App\Http\Controllers\Main\MainPagesController;
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

Route::get('/', [MainPagesController::class, 'homepage']);

Route::get('/pomeranian', [MainPagesController::class, 'poms'])->name('poms.all');

// start demo
Route::get('/demo', function() {
	return view('pages.main.slider');
});

Route::get('/gal', function() {
	return view('pages.main.gal');
});
// end demo