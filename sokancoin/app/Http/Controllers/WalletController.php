<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::all();
        return view('wallets.index', compact(['wallets']));
    }
    public function show($address)
    {
        $wallet = Wallet::where("address", $address)->first();
        if (!$wallet) {
            return redirect()->back()->with('error', 'Wallet not found');
        }
        $transactions = Transaction::with(['originWallet', 'destinationWallet'])->where(
            'origin_wallet_id', $wallet->id
        )->orWhere(
            'destination_wallet_id', $wallet->id
        )->get();
        return view('wallets.show', compact(['wallet', 'transactions']));
    }
}
