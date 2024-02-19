<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/lang/{lang}', function ($lang) {
    session(['lang'=> $lang]);
    // dd(session()->all());
    return back();
});

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoriesController::class);
    Route::resource('post', PostController::class);
    Route::resource('tag', TagController::class);
    Route::post('/post-image-upload', [PostController::class,'upload'])->name('upload');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
