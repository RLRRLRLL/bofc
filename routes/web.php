<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Main\MainPagesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


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
	Route::get('/pomeranians', \App\Http\Livewire\Visitor\Poms\Index::class)->name('poms.index');
	Route::get('/pomeranians/{id}/show', \App\Http\Livewire\Visitor\Poms\Show::class)->name('poms.show');
	Route::get('/gallery', [MainPagesController::class, 'gallery'])->name('gallery');
	Route::get('/news', [ArticleController::class, 'index'])->name('news.index');
	Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('news.show');

	// admin pages
	Route::group([
		'prefix' => '/12a5155wo298d1u3d1j0',
	], function() {
		// Pom related
		Route::get('/', [AdminPagesController::class, 'index'])->name('admin.poms-index');
		Route::get('/create', [AdminPagesController::class, 'createPom'])->name('admin.poms-create');
		Route::get('/pom/{id}', [AdminPagesController::class, 'show'])->name('admin.poms-show');

		// People (breeders, owners)
		Route::get('/people', \App\Http\Livewire\Admin\People::class)->name('admin.people');
		
		// Articles
		Route::get('/articles', \App\Http\Livewire\Admin\Articles\Index::class)->name('admin.articles.index');
		Route::get('/articles/create', \App\Http\Livewire\Admin\Articles\Create::class)->name('admin.articles.create');
	}); 
});

// Clear cache
Route::get('/cache', function() {
	Artisan::call('config:cache');
	return 'OK';
});