<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['origin_wallet_id', 'destination_wallet_id', 'amount'];
}
