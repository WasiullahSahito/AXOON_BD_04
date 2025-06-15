<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Show role-based message on dashboard
Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? 'guest';
    return view('dashboard', compact('role'));
})->middleware(['auth', 'verified'])->name('dashboard');


// Routes only for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only route
Route::get('/admin', function () {
    return "Admin Page Content";
})->middleware(['auth', 'role:admin'])->name('admin');

// User-only route
Route::get('/user', function () {
    return "User Page Content";
})->middleware(['auth', 'role:user'])->name('user');

require __DIR__ . '/auth.php';
