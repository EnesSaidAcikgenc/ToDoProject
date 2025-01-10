<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController;
use \App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});


//task routeları başlangıç
Route::get('/create', [TaskController::class, 'createPage'])->name('create');
Route::post('/add', [TaskController::class, 'addTask'])->name('addTask');
//task routeları Bitiş

//kategori routes start

Route::get('/panel/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/panel/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/panel/categories/add', [CategoryController::class, 'store'])->name('categories.add');
Route::get('/panel/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
//Route::post('/panel/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update'); bu parametre ile güncelleme yapma routeu
Route::post('/panel/categories/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/panel/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

//kategori routes end


//test route
Route::get('/test', function () {
    return view('panel.layout.app');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
