<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Database\Factories\ProjectFactory;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects');

Route::get('projects/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('createProject');
Route::post('projects/delete/{project}', [ProjectController::class, 'delete'])->middleware(['auth'])->name('deleteProject');
Route::post('projects/update/{project}', [ProjectController::class, 'update'])->middleware(['auth'])->name('updateProject');
Route::post('projects', [ProjectController::class, 'store'])->middleware(['auth'])->name('storeProject');

Route::get('projects/{project}', [ProjectController::class, 'show'])->middleware(['auth'])->name('showProject');
Route::get('projects/{project}/settings', [ProjectController::class, 'settings'])->middleware(['auth'])->name('showProjectSettings');



require __DIR__.'/auth.php';