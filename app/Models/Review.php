<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ['product_id', 'buyer_id', 'rating', 'comment'];

    // رابطه چند به یک با Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // رابطه چند به یک با User (به عنوان خریدار)
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
