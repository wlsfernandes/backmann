<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Language Switcher
|--------------------------------------------------------------------------
*/

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Frontend (5 pages)
|--------------------------------------------------------------------------
*/
Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/projects', [SiteController::class, 'projects'])->name('projects');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

// view images
Route::get('images/{model}/{id}/preview', [ImageUploadController::class, 'preview'])->name('admin.images.preview');
Route::post('/send-email', [ContactController::class, 'send'])->name('contact.send');
Route::get('/projects/{slug}', [SiteController::class, 'projectDetail'])->name('site.projects.show');

// Optional POST contact
Route::post('/contact', [SiteController::class, 'contactSend'])
    ->name('contact.send')
    ->middleware('throttle:5,1');
