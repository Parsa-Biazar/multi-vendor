<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_id', 'name', 'description', 'price', 'stock', 'is_active'];

    // رابطه چند به یک با Vendor
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    // رابطه یک به چند با ProductImage
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // رابطه چند به چند با Brand از طریق جدول brandproduct
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brand_product');
    }

    // رابطه چند به چند با Category از طریق جدول productcategories
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'product_categories');
    }

    public function scopeActiveDesc($query)
    {
        return $query->where('is_active', 1)->latest();
    }
}
