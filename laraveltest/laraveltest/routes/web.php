<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/create', [\App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
Route::post('/store', [\App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
Route::get('/edit/${id}', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/update/${id}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
Route::get('/${id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');
Route::delete('/delete/${id}', [\App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');
Route::post("article/image/store", [\App\Http\Controllers\ImageController::class, 'store'])->name('images.store');
Route::delete('/image/${image}', [\App\Http\Controllers\ImageController::class, 'destroy'])->name('images.destroy');
