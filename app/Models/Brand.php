<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    protected $fillable = ['name', 'description'];

    // رابطه چند به چند با Product از طریق جدول brand_product
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'brandproduct');
    }
}
