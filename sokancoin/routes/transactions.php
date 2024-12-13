<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::delete('/admin/transactions/{id}', [TransactionController::class, 'delete'])->name('transactions.delete');
Route::patch('/admin/transactions/{id}/accept', [TransactionController::class,'accept'])->name('transactions.accept');
Route::get('/transactions/create', [TransactionController::class,'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class,'store'])->name('transactions.store');
Route::get('transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::patch('transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');