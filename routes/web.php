<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, '`edit`'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/post/add', [BlogPostController::class, 'createBlogPost'])->name('add')->middleware(['auth', 'verified']);
Route::get('/post/form', [BlogPostController::class, 'showForm'])->name('form')->middleware(['auth', 'verified']);
Route::get('/', [HomeController::class, 'showBlogs'])->name('blogs');
Route::get('/blog/{id}', [HomeController::class, 'singleBlog'])->name('blog');
Route::get('/all', [HomeController::class, 'all'])->name('allBlogs');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

require __DIR__.'/auth.php';
