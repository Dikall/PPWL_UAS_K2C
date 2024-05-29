<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SaldoController;
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
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('saldo', SaldoController::class);
        Route::get('admin/pengeluaran', [PengeluaranController::class, 'pengeluaran.index'])->name('pengeluaran.index');
    });
    Route::resource('pengeluaran', PengeluaranController::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('pengeluaran/{pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
});
