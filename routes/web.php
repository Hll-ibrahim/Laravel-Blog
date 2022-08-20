<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function() {
    Route::get('giris', [AuthController::class, 'login'])->name('login');
    Route::post('giris', [AuthController::class, 'loginPost'])->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function() {
    Route::get('panel',[Dashboard::class, 'index'])->name('dashboard');

    // Makale Route
    Route::get('makaleler/silinenler', [ArticleController::class, 'trashed'])->name('trashed.article');
    Route::resource('makaleler', ArticleController::class);
    Route::get('switch',[ArticleController::class, 'switch'])->name('switch');
    Route::get('deletearticle/{id}',[ArticleController::class, 'delete'])->name('delete.article');
    Route::get('harddeletearticle/{id}',[ArticleController::class, 'hardDelete'])->name('harddelete.article');
    Route::get('recoverarticle/{id}',[ArticleController::class, 'recover'])->name('recover.article');

    //Kategori Route
    Route::get('kategoriler',[CategoryController::class, 'index'])->name('category.index');
    Route::post('kategoriler/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('kategoriler/update',[CategoryController::class, 'update'])->name('category.update');
    Route::get('kategori/status',[CategoryController::class, 'switch'])->name('category.switch');
    Route::get('kategori/getData',[CategoryController::class, 'getData'])->name('category.getdata');
    Route::get('cikis', [AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

//Route::get('/', [Homepage::class, 'index']);
Route::get('/', [Homepage::class, 'index'])->name('homepage');
Route::get('/iletisim', [Homepage::class, 'contact'])->name('contact');
Route::post('/iletisim', [Homepage::class, 'contactpost'])->name('contact.post');
Route::get('category/{category}', [Homepage::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [Homepage::class, 'single'])->name('single');
Route::get('/{sayfa}',[Homepage::class, 'page'])->name('page');
