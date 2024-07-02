<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'image_path'];

    // رابطه چند به یک با Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
