<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::delete('/admin/transactions/{id}', [TransactionController::class, 'delete'])->name('transactions.delete');
Route::patch('/admin/transactions/{id}/accept', [TransactionController::class,'accept'])->name('transactions.accept');
