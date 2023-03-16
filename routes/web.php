<?php

use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebHomeController;
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

Route::get('/', [WebHomeController::class,'index']);

Route::get('/dashboard',[MediaController::class ,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/create',[MediaController::class ,'getCreate'])->middleware(['auth'])->name('get.createMedia');
Route::post('/dashboard/create',[MediaController::class ,'postCreate'])->middleware(['auth'])->name('post.createMedia');
Route::get('/dashboard/create/delete/{id}',[MediaController::class ,'delete'])->middleware(['auth'])->name('delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
