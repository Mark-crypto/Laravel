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




Route::get('/request-access', [TenantController::class, 'getAccess'])->name('userRequest');
Route::post('/request-access', [TenantController::class, 'storeAccess'])->name('userRequest.store');

Route::get('generateCsv', [TenantController::class, 'generateCsv'])->name('download.csv');
Route::post('email', [TenantController::class, 'sendEmail'])->name('email');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/addUsers', function () {
        return view('addUsers');
    })->name('addUsers');
    Route::get('/report', function () {
        return view('report');
    })->name('report');

    Route::controller(TenantController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/renter', 'rent')->name('renters');
        Route::get('/renter/payment', 'payment')->name('payment');
        Route::get('/renter/problems', 'problems')->name('problems');
        Route::post('/renter',  'storeProblems')->name('problems.store');

        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/problem', 'getProblems')->name('retrieveProblems');
        Route::get('/receive', 'receiveReq')->name('receive');


        Route::get('/create', 'create')->name('addUsers');
        Route::post('/',  'store')->name('dashboard.store');
        Route::get('/{tenant}/edit', 'edit')->name('dashboard.edit');
        Route::put('/{tenant}/update', 'update')->name('dashboard.update');
        Route::delete('/{tenant}/destroy', 'destroy')->name('dashboard.destroy');
    });
    Route::post('/renter/payment', [DarajaController::class, 'index'])->name('payment.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::fallback(function () {
    return redirect(route('home'));
})->name("fallback");

require __DIR__ . '/auth.php';
