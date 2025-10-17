<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[PageController::class,'home'])->name('home');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/course',[PageController::class,'course'])->name('course');
Route::get('/admission',[PageController::class,'admission'])->name('admission');

Route::get('/admin/gallery/create',[AdminController::class,'index'])->name('add-gallery');

Route::post('/admin/gallery/store',[AdminController::class,'store'])->name('gallery.store');

Route::get('/gallery',[GalleryController::class,'gallery'])->name('gallery');
Route::get('/gallery/{slug}',[GalleryController::class,'view'])->name('gallery.view');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
