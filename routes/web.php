<?php

use App\Http\Controllers\ProjectController;
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

Route::get('/', [ProjectController::class, 'index']);

Route::prefix('/projects')->group(function() {
    Route::get('/create/{projectId?}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
});
