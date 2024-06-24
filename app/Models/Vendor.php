<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $fillable = ['user_id', 'store_name', 'store_description'];

    // رابطه چند به یک با User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // رابطه یک به چند با Product
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
