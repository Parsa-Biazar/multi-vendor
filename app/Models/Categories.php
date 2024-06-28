<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // رابطه چند به چند با Product از طریق جدول productcategories
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'productcategories');
    }
}
