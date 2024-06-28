<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // رابطه چند به یک با Order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // رابطه چند به یک با Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
