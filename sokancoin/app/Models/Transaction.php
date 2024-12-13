<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['origin_wallet_id', 'destination_wallet_id', 'amount'];

    public function originWallet()
    {
        return $this->belongsTo(Wallet::class, 'origin_wallet_id');
    }

    public function destinationWallet()
    {
        return $this->belongsTo(Wallet::class, 'destination_wallet_id');
    }
}
