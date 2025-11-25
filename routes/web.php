<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Products (Public to auth users for viewing)
    Route::get('products', [ProductController::class, 'index'])->name('products.index');

    // Admin only
    Route::middleware(['role:admin'])->group(function () {
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
        Route::get('reports', [TransactionController::class, 'index'])->name('reports.index');
        Route::get('reports/print', [TransactionController::class, 'print_report'])->name('reports.print');
    });

    // Products (Admin & Gudang)
    Route::middleware(['role:admin|gudang'])->group(function () {
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
        
        // Barcodes
        Route::get('barcodes/{id}/print', [BarcodeController::class, 'printOne'])->name('barcodes.print_one');
        Route::get('barcodes/{id}/show', [BarcodeController::class, 'show'])->name('barcodes.show');
    });

    // Stocks (Write Access: Gudang, Kasir)
    Route::middleware(['role:gudang|kasir'])->group(function () {
        Route::get('stocks/create', [StockController::class, 'create'])->name('stocks.create');
        Route::post('stocks', [StockController::class, 'store'])->name('stocks.store');
    });

    // Stocks (Read Access: Admin, Gudang, Kasir)
    Route::middleware(['role:admin|gudang|kasir'])->group(function () {
        Route::get('stocks', [StockController::class, 'index'])->name('stocks.index');
        Route::get('stocks/{id}', [StockController::class, 'show'])->name('stocks.show');
    });

    // Gudang & Kasir
    Route::middleware(['role:gudang|kasir'])->group(function () {
        Route::get('my-transactions', [TransactionController::class, 'history'])->name('transactions.history');
        Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('transactions/{invoice_code}', [TransactionController::class, 'show'])->name('transactions.show');
        Route::get('transactions/{invoice_code}/print', [TransactionController::class, 'print'])->name('transactions.print');
    });
});

require __DIR__.'/auth.php';
