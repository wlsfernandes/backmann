<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\SystemLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PublishController;

/*
|--------------------------------------------------------------------------
| Authentication (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Optional /admin/dashboard redirect
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            return redirect()->route('admin.dashboard');
        });

        /*
        |--------------------------------------------------------------------------
        | Administration
        |--------------------------------------------------------------------------
        */

        Route::middleware('can:access-admin')->group(function () {

            Route::resource('users', UserController::class)->except(['show']);

            Route::get('system-logs', [SystemLogController::class, 'index'])
                ->name('system-logs.index');

        });

        /*
        |--------------------------------------------------------------------------
        | Website Admin
        |--------------------------------------------------------------------------
        */

        Route::middleware('can:access-website-admin')->group(function () {

            Route::resource('abouts', AboutController::class);
            Route::resource('banners', BannerController::class);
            Route::resource('blogs', BlogController::class);
            Route::resource('gallery-images', GalleryImageController::class);
            Route::resource('projects', ProjectController::class);
            Route::resource('projects.images', ProjectImageController::class);
            Route::resource('services', ServiceController::class);
            Route::resource('social-links', SocialLinkController::class);
            Route::resource('pages', PageController::class);
            Route::resource('pages.sections', SectionController::class)->scoped();

            Route::get('settings', [SettingController::class, 'edit'])->name('settings.form');
            Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
        });

        /*
        |--------------------------------------------------------------------------
        | File & Image Management
        |--------------------------------------------------------------------------
        */

        Route::get('files/{model}/{id}/{lang}', [FileUploadController::class, 'edit'])
            ->name('files.edit');

        Route::post('files/{model}/{id}/{lang}', [FileUploadController::class, 'update'])
            ->name('files.update');

        Route::get('files/{model}/{id}/{lang}/download', [FileUploadController::class, 'download'])
            ->name('files.download');

        Route::get('images/{model}/{id}', [ImageUploadController::class, 'edit'])
            ->name('images.edit');

        Route::post('images/{model}/{id}', [ImageUploadController::class, 'update'])
            ->name('images.update');

        

        Route::delete('images/{model}/{id}', [ImageUploadController::class, 'destroy'])
            ->name('images.destroy');

        /*
        |--------------------------------------------------------------------------
        | Publish Toggle
        |--------------------------------------------------------------------------
        */

        Route::patch('publish/{model}/{id}', [PublishController::class, 'toggle'])
            ->name('publish.toggle');

        /*
        |--------------------------------------------------------------------------
        | Public Project Display
        |--------------------------------------------------------------------------
        */

        Route::get('our-projects/{slug}', [ProjectController::class, 'display'])
            ->name('projects.display');

    });
