<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCart extends Model
{
    protected $table    = 'user_carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_size_id',
        'product_color_id',
        'quantity',
        'product_price',
        'is_discount',
        'discount_value',
        'discount_type',
        'total_price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
