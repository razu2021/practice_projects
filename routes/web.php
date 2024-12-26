<?php

use App\Http\Controllers\form\formController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('frontend.index');
})->name('home');
Route::get('/about', function () {
    return view('frontend.pages.about');
});
Route::get('/service', function () {
    return view('frontend.pages.service');
});
Route::get('/blog', function () {
    return view('frontend.pages.blog');
});
Route::get('/contact', function () {
    return view('frontend.pages.contact');
});
Route::get('/component', function () {
    return view('frontend.component.index');
});



Route::post('submit-form1',[formController::class,'insert']);



Route::view('basic','frontend.fromall.basic');
Route::post('basic-form',[formController::class,'basic']);

// toaster
Route::view('test','frontend.fromall.test');
Route::post('test-form',[formController::class,'test']);

// sweet alert 
Route::view('sweet','frontend.fromall.sweet');
Route::post('sweet-form',[formController::class,'sweet']);
Route::post('delete-form',[formController::class,'delete'])->name('delete-form');


// flasher alert 
Route::view('flasher','frontend.fromall.flaser');
Route::post('flasher-form',[formController::class,'flasher']);












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
