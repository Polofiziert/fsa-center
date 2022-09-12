<?php
use App\Models\Project;
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

Route::get('projects', function () {
    return view('projects', [
        "projects" => Project::all()
    ]);
})->middleware(['auth'])->name('projects');

Route::get('project/{id}', function ($id) {
    return view('project', [
        "project" => Project::findOrFail($id)
    ]);
})->middleware(['auth'])->name('project');

require __DIR__.'/auth.php';
