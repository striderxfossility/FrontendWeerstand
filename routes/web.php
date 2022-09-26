<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/',[PageController::class, 'home'])->name('home');
Route::get('/contact',[PageController::class, 'contact'])->name('contact');
Route::get('/collectie',[PageController::class, 'collectie'])->name('collectie');
Route::get('/tegels',[PageController::class, 'tegels'])->name('tegels');
Route::get('/diensten',[PageController::class, 'diensten'])->name('diensten');
Route::get('/projecten',[PageController::class, 'projecten'])->name('projecten');
Route::get('/blog',[PageController::class, 'blog'])->name('blog');
Route::get('/pagina/{slug}',[PageController::class, 'pagina'])->name('pagina');
Route::get('/collectie/{slug}',[PageController::class, 'collectiePage'])->name('collectiePage');
Route::get('/tegels/{slug}',[PageController::class, 'tegelsPage'])->name('tegelsPage');
Route::get('/diensten/{slug}',[PageController::class, 'dienstenPage'])->name('dienstenPage');
Route::get('/projecten/{slug}',[PageController::class, 'projectenPage'])->name('projectenPage');
Route::get('/offerte/{slug}',[PageController::class, 'offerte'])->name('offerte');
Route::get('/collectie-product/{slug}/{productSlug}',[PageController::class, 'collectieProduct'])->name('collectieProduct');
