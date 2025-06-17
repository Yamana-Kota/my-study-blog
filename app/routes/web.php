<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('blog.index');
});

Route::get('/',App\Http\Controllers\Blog\IndexAction::class)->name('blog.index');
Route::get('/create',App\Http\Controllers\Blog\CreateAction::class)->name('blog.create');
Route::get('/edit/{blog}',App\Http\Controllers\Blog\EditAction::class)->name('blog.edit');
Route::post('/store',App\Http\Controllers\Blog\StoreAction::class)->name('blog.store');
Route::post('/update/{blog}',App\Http\Controllers\Blog\UpdateAction::class)->name('blog.update');
Route::get('/detail/{blog}',App\Http\Controllers\Blog\DetailAction::class)->name('blog.detail');
Route::post('/delete/{blog}',App\Http\Controllers\Blog\DeleteAction::class)->name('blog.delete');
