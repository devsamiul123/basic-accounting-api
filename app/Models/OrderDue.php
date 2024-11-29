<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDue extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDueFactory> */
    use HasFactory;
    protected $fillable = ['order_id', 'paid_amount', 'due_amount', 'paid_date'];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}
