<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/employees', [UserController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [UserController::class, 'create'])->name('employees.create');
    Route::post('/employees-table', [UserController::class, 'table'])->name('employees.table');
    Route::post('/employees', [UserController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/edit', [UserController::class, 'edit'])->name('employees.edit');
    Route::patch('/employees/{id}', [UserController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}/delete', [UserController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/{id}/delete', [UserController::class, 'deleteModal'])->name('employees.deleteModal');
});

require __DIR__.'/auth.php';
