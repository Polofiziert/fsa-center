<?php

use App\Http\Controllers\CampController;
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



Route::get('project', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects');

Route::get('project/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('createProject');
Route::post('project/delete/{project}', [ProjectController::class, 'delete'])->middleware(['auth'])->name('deleteProject');
Route::post('project/update/{project}', [ProjectController::class, 'update'])->middleware(['auth'])->name('updateProject');
Route::post('project', [ProjectController::class, 'store'])->middleware(['auth'])->name('storeProject');

Route::get('project/{project}', [ProjectController::class, 'show'])->middleware(['auth'])->name('showProject');
Route::get('project/{project}/settings', [ProjectController::class, 'settings'])->middleware(['auth'])->name('showProjectSettings');


Route::get('project/{project}/camp', [CampController::class, 'index'])->middleware(['auth'])->name('camps');

Route::get('project/{project}/camp/create', [CampController::class, 'create'])->middleware(['auth'])->name('createCamp');
//Route::post('project/{project}/camp/delete/{camp}', [CampController::class, 'delete])->middleware(['auth'])->name('deleteCamp');
//Route::post('project/{project}/camp/update/{camp}', [CampController::class, 'update'])->middleware(['auth'])->name('updateCamp');
Route::post('project/{project}/camp', [CampController::class, 'store'])->middleware(['auth'])->name('storeCamp');

//Route::get('project/{project}/camp/{camp}', [CampController::class, 'index'])->middleware(['auth'])->name('showCamp');

require __DIR__.'/auth.php';