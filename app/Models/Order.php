<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['buyer_id', 'total_price', 'status'];

    // رابطه یک به چند با OrderItem
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // رابطه چند به یک با User (به عنوان خریدار)
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
