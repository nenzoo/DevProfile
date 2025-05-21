<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Projets
    Route::resource('projects', ProjectController::class);

    // Compétences
    Route::resource('skills', SkillController::class)->except(['show', 'edit', 'update']);

    // Génération de PDF
    Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');
});

// Profil public (accessible sans authentification)
Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.show');
// Profil public (accessible sans authentification)
Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';