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



Route::redirect('/', fn() => redirect(app()->getLocale()));

Route::group([
		'prefix' => '{lang}',
		'where' => ['locale' => '[a-zA-Z]{2}'],
		'middleware' => 'setlocale'
	], function() {
	Route::get('/', [MainPagesController::class, 'homepage'])->name('homepage');
	Route::get('/pomeranian', [MainPagesController::class, 'index'])->name('poms.index');
	Route::get('/pomeranian/{id}', [MainPagesController::class, 'show'])->name('poms.show');
	Route::get('/gallery', [MainPagesController::class, 'gallery'])->name('gallery');

	// auth
	Auth::routes();

	// admin pages
	Route::middleware('auth')->prefix('/admin')->group(function() {
		// Settings
		Route::get('/settings', [AdminPagesController::class, 'settings'])->name('settings');
		// Pom related
		Route::get('/', [AdminPagesController::class, 'index'])->name('admin');
		Route::get('/create', [AdminPagesController::class, 'createPom'])->name('create.new.pom');
		Route::get('/pom/{id}', [AdminPagesController::class, 'show'])->name('show.new.pom');
	}); 
});

// Clear cache
Route::get('/cache', function() {
	Artisan::call('config:cache');
	return 'OK';
});