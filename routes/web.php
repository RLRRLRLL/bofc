<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Main\MainPagesController;
use App\Http\Livewire\Pom\Index;
use App\Http\Livewire\Pom\Show;
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
})->name('change-language');

Route::middleware('set.locale')->group(function() {
	Route::get('/', [MainPagesController::class, 'homepage'])->name('homepage');
	Route::get('/pomeranians', Index::class)->name('poms.index');
	Route::get('/pomeranians/{id}/show', Show::class)->name('poms.show');
	Route::get('/gallery', [MainPagesController::class, 'gallery'])->name('gallery');

	// admin pages
	Route::group([
		'prefix' => '/12a5155wo298d1u3d1j0',
	], function() {
		// Pom related
		Route::get('/', [AdminPagesController::class, 'index'])->name('admin.poms-index');
		Route::get('/create', [AdminPagesController::class, 'createPom'])->name('admin.poms-create');
		Route::get('/pom/{id}', [AdminPagesController::class, 'show'])->name('admin.poms-show');
		// Settings
		Route::get('/settings', [AdminPagesController::class, 'settings'])->name('settings');
	}); 
});

// Clear cache
Route::get('/cache', function() {
	Artisan::call('config:cache');
	return 'OK';
});