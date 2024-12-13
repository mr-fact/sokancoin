<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['originWallet', 'destinationWallet'])->where('status', false)->get();
        $accepted_transactions = Transaction::with(['originWallet', 'destinationWallet'])->where('status', true)->get();
        return view('transactions.index', compact(['transactions', 'accepted_transactions']));
    }

    public function accept($id)
    {
        DB::beginTransaction();
        try {
            $transaction = Transaction::findOrFail($id);

            if ($transaction->status === true) {
                return redirect()->route('transactions.index')->with('error', 'Transaction already accepted');
            }

            $originWallet = $transaction->originWallet;
            $destinationWallet = $transaction->destinationWallet;

            if ($originWallet && $destinationWallet) {
                $originWallet->amount -= $transaction->amount;
                $originWallet->save();
                $destinationWallet->amount += $transaction->amount;
                $destinationWallet->save();
                $transaction->status = true;
                $transaction->save();
            }
            else {
                throw new \Exception('origin or destination wallet not found');
            }
            DB::commit();
            return redirect()->route('transactions.index')->with('success', 'Transaction accepted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('transactions.index')->with('error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with('error', $e->getMessage());
        }
    }
    public function create()
    {
        $wallets = Wallet::all(); // Fetch all wallets for the dropdowns
        return view('transactions.create', compact('wallets'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin_wallet_id' => 'required|exists:wallets,id|different:destination_wallet_id',
            'destination_wallet_id' => 'required|exists:wallets,id',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $transaction = Transaction::create([
                'origin_wallet_id' => $validated['origin_wallet_id'],
                'destination_wallet_id' => $validated['destination_wallet_id'],
                'amount' => $validated['amount'],
            ]);

            return redirect()->route('wallets.index')->with('success', 'Transaction created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while creating the transaction.');
        }
    }
}
