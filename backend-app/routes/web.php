<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'web']
    ],
    function () {
        Route::get('/', [App\Http\Controllers\Website\WebsiteController::class, 'index'])->name('index');

        Route::get('posts/{id}', [\App\Http\Controllers\website\WebsiteController::class , 'posts'])->name('posts_id');
        Route::get('post_detailes/{id}', [\App\Http\Controllers\website\WebsiteController::class , 'post_details'])->name('post_details');

        // ✅ routes الخاصة بالمصادقة مع دعم اللغة
        Auth::routes();

        Route::prefix('dashboard')->middleware(['auth'])->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');

            Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
            Route::post('settings/update/{setting}', [SettingController::class , 'update'])->name('settings.update');

            Route::resource('category', CategoryController::class);
            Route::post('category/delete', [CategoryController::class , 'delete'])->name('category.delete');

            Route::resource('post', PostController::class);
            Route::post('post/delete', [PostController::class , 'delete'])->name('post.delete');
        });
    }
);

// ✅ صفحة البلوق خارج المجموعة (بدون لغة)
Route::get('blog', [\App\Http\Controllers\website\InsideController::class, 'index'])->name('blog.index');

// ✅ تغيير اللغة
Route::post('/change-language', function (\Illuminate\Http\Request $request) {
    $lang = $request->language;
    session(['locale' => $lang]);
    app()->setLocale($lang);
    return back();
})->name('language.change');

// ✅ صفحة الهوم بعد تسجيل الدخول
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ✅ أي صفحة غير معرفة تذهب إلى AdminController
Route::get('/{page}', [AdminController::class, 'index']);
