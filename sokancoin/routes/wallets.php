<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/wallets/{address}', [WalletController::class, 'show'])->name('wallets.show');
Route::get('/wallets', [WalletController::class, 'index'])->name('wallets.index');
