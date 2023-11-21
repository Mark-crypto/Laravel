<?php

use App\Http\Controllers\DarajaController;
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

Route::get('/request-access', [TenantController::class, 'getAccess'])->name('userRequest');
Route::post('/request-access', [TenantController::class, 'storeAccess'])->name('userRequest.store');

Route::get('generateCsv', [TenantController::class, 'generateCsv'])->name('download.csv');
Route::post('email', [TenantController::class, 'sendEmail'])->name('email');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TenantController::class, 'index'])->name('dashboard');
    //renters
    Route::get('/renter', [TenantController::class, 'rent'])->name('renters');
    Route::get('/renter/payment', [TenantController::class, 'payment'])->name('payment');
    Route::post('/renter/payment', [DarajaController::class, 'index'])->name('payment.store');
    Route::get('/renter/problems', [TenantController::class, 'problems'])->name('problems');
    Route::post('/renter', [TenantController::class, 'storeProblems'])->name('problems.store');
    //end
    Route::get('/dashboard', [TenantController::class, 'index'])->name('dashboard');
    Route::get('/problem', [TenantController::class, 'getProblems'])->name('retrieveProblems');
    Route::get('/receive', [TenantController::class, 'receiveReq'])->name('receive');


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