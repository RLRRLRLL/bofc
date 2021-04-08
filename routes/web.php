<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Main\MainPagesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Change language for session
Route::get('change-language/{lang}', function($lang) {
	\Session::put('locale', $lang);
	return redirect()->back();
});

Route::middleware('setlocale')->group(function() {
	Route::get('/', [MainPagesController::class, 'homepage'])->name('homepage');
	Route::get('/pomeranian', [MainPagesController::class, 'index'])->name('poms.index');
	Route::get('/pomeranian/{id}', [MainPagesController::class, 'show'])->name('poms.show');
	Route::get('/gallery', [MainPagesController::class, 'gallery'])->name('gallery');

	// auth
	Auth::routes();

	// admin pages
	Route::group([
		'prefix' => '/admin',
		'middleware' => 'auth',
	], function() {
		// Pom related
		Route::get('/', [AdminPagesController::class, 'index'])->name('admin');
		Route::get('/create', [AdminPagesController::class, 'createPom'])->name('create.new.pom');
		Route::get('/pom/{id}', [AdminPagesController::class, 'show'])->name('show.new.pom');
		// Settings
		Route::get('/settings', [AdminPagesController::class, 'settings'])->name('settings');
	}); 
});

// Clear cache
Route::get('/cache', function() {
	Artisan::call('config:cache');
	return 'OK';
});