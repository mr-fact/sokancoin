<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'address'];

    // Method to generate a random address
    public static function generateRandomAddress($length = 21)
    {
        $randomAddr = substr(str_shuffle(str_repeat('0123456789', $length)), 0, $length);
        return 'SA' . $randomAddr;
    }
}
