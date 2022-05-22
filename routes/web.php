<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajaxcrud\AjaxPostController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::post('/addcategory', [App\Http\Controllers\HomeController::class, 'addcategory'])->name('addcategory');
Route::get('/save', [App\Http\Controllers\HomeController::class, 'savedata'])->name('save');
Route::get('/articles', [App\Http\Controllers\HomeController::class, 'articles'])->name('articles');
//Route::resource('ajax-posts', 'ajaxcrud\AjaxPostController');
Route::resource('ajax-posts', AjaxPostController::class);

