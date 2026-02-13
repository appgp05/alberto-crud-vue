<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/main');

Route::get('/main', function () {
    return Inertia::render('Main');
})->name('main');

Route::get('/cronometro', function () {
    return Inertia::render('Cronometro');
})->name('cronometro');

Route::get('/projects-list', [ProjectController::class, 'index'])->name('projects-list');

Route::resource('project', ProjectController::class);

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canRegister' => Features::enabled(Features::registration()),
//    ]);
//})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
