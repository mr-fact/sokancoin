<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect('/wallets');
});

require __DIR__.'/transactions.php';
require __DIR__.'/wallets.php';