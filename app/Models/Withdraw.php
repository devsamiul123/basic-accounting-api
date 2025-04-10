<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    /** @use HasFactory<\Database\Factories\WithdrawFactory> */
    use HasFactory;
    protected $fillable = ['withdraw_amount', 'withdraw_date'];

}
