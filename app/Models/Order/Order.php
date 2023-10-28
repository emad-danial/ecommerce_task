<?php

namespace App\Models\Order;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\User;
use App\Models\User\UserAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table    = "orders";
    protected $fillable = [
        'user_id',
        'total_price',
        'address',

    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address():BelongsTo
    {
        return $this->belongsTo(UserAddress::class,'address_id');
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategory():BelongsTo
    {
        return $this->belongsTo(Category::class,'sub_category_id');
    }
}
