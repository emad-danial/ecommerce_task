<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name_ar',
        'name_en',
        'main_category',
        'sub_category',
        'description_ar',
        'description_en',
        'price',
        'image',
        'is_active'
    ];
    public function mainCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'main_category');
    }
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }
}
