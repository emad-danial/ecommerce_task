<?php

namespace App\Models\Order;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table    = "order_details";
    protected $fillable = [
        'order_id',
        'product_id',
        'product_price',
        'total_price',
        'quantity',

    ];

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class, 'user_id');
    }

}
