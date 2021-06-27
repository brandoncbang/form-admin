<?php

use App\Http\Controllers\FormController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/forms', [FormController::class, 'index'])
        ->name('form.index');

    Route::get('/forms/new', [FormController::class, 'create'])
        ->name('form.create');

    Route::post('/forms', [FormController::class, 'store'])
        ->name('form.store');

    Route::get('/forms/{id}', [FormController::class, 'show'])
        ->name('form.show');

    Route::get('/forms/{id}/settings', [FormController::class, 'edit'])
        ->name('form.edit');

    Route::put('/forms/{id}', [FormController::class, 'update'])
        ->name('form.update');

    Route::delete('/forms/{id}', [FormController::class, 'destroy'])
        ->name('form.destroy');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
