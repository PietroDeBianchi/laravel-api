<?php

use App\Http\Admin\Controllers\TechnologyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController; //remenber to add!
use App\Http\Controllers\Admin\SkillController; //remenber to add!
use App\Http\Controllers\ProfileController;
use App\Models\Project;
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

Route::get('/', function () {
    $projects = Project::all(); // connect project table to view welcome
    return view('welcome', compact('projects'));
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // Route = / + prefix (admin) = '/admin' -> linkedto DashboardController
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Route = / + prefix (admin) + projects = '/admin/projects' -> linkedto ProjectController
        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'project:slug' // added slug parameter for URL
        ]);
        Route::resource('skills', SkillController::class)->parameters([
            'skills' => 'skill:slug' // added slug parameter for URL
        ])->except(['show']);
        Route::resource('technologies', TechnologyController::class)->parameters([
            'technologies' => 'techology:slug' // added slug parameter for URL
        ])->except(['show']);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
