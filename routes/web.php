<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
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


Route::get('/addUsers', function () {
    return view('addUsers');
})->middleware(['auth', 'verified'])->name('addUsers');
Route::get('/report', function () {
    return view('report');
})->middleware(['auth', 'verified'])->name('report');

Route::get('generateCsv', [TenantController::class, 'generateCsv'])->name('download.csv');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TenantController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [TenantController::class, 'index'])->name('dashboard');
    Route::get('/create', [TenantController::class, 'create'])->name('addUsers');
    Route::post('/', [TenantController::class, 'store'])->name('dashboard.store');
    Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('dashboard.edit');
    Route::put('/{tenant}/update', [TenantController::class, 'update'])->name('dashboard.update');
    Route::delete('/{tenant}/destroy', [TenantController::class, 'destroy'])->name('dashboard.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('/admin', function () {
//     return view('admin');
// })->middleware(['auth', 'verified'])->name('admin');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    // Route::get('/', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');