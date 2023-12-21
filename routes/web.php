<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EquipeController;
use \App\Http\Controllers\HistoireController;
use \App\Http\Controllers\ChapitreController;

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
})->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('equipe', [EquipeController::class, 'index'])->name("equipe");

Route::get('index', [HistoireController::class, 'carousel'])->name("index");

Route::get('histoire/{id}', [HistoireController::class, 'show'])->name("histoire.show");
Route::get('histoires/create', [HistoireController::class, 'create'])->name("histoire.create");
Route::post('histoires', [HistoireController::class, 'store'])->name("histoire.store");
Route::get('histoires/{id}/starthistory', [HistoireController::class, 'starthistory'])->name("histoire.starthistory");
Route::get('histoires/{username}/profile', [HistoireController::class, 'dashboard'])->name("user.dashboard");
Route::post('histoires', [HistoireController::class, 'index'])->name("histoire.un");
Route::post('histoires/{id}/avis', [HistoireController::class, 'addAvis'])->name("histoire.avis");
Route::get('histoires', [HistoireController::class, 'index'])->name("histoire.index");
Route::post('histoires/store', [HistoireController::class, 'store'])->name("histoire.store");
Route::get('histoires/{id}/edit', [HistoireController::class, 'edit'])->name("histoire.edit");
Route::put('histoires/{id}', [HistoireController::class, 'update'])->name("histoire.update");
Route::delete('histoires/{id}', [HistoireController::class, 'destroy'])->name("histoire.destroy");
Route::get('dashboard', [HistoireController::class, 'dashboardUser'])->name("dashboard");
Route::post('/user/avatar', [HistoireController::class, 'updateAvatar'])->name('user.updateAvatar');
Route::get('/encours/{id}/create', [ChapitreController::class, 'create'])->name('encours.create');
Route::post('/encours/{id}', [ChapitreController::class, 'store'])->name('encours.store');
// Dans routes/web.php
Route::post('/chapitres/order/{id}', [ChapitreController::class, 'order'])->name('chapitres.order');

Route::get('/histoire/{histoire}/chapitre/{chapitre}', [App\Http\Controllers\HistoireController::class, 'showChapitre'])->name('histoire.showChapitre');