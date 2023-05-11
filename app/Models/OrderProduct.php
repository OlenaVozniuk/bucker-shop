<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Order $order
 * @property Product $product
 */
class OrderProduct extends Model
{
    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string[]
     */
    protected $primaryKey = ['order_id', 'product_id'];

    /**
     * @var string
     */
    protected $keyType = 'array';

    /**
     * @var string[]
     */
    protected $fillable = ['order_id', 'product_id', 'quantity', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
