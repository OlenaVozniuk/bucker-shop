<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Ramsey\Collection\Collection;

/**
 * @property integer $id
 * @property string $first_name
 * @property string $second_name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $address
 * @property integer $city_code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Product[]|Collection $products
 */
class Order extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'second_name', 'email', 'phone', 'city', 'address', 'city_code', 'created_at', 'updated_at'
    ];

    /**
     * @return HasManyThrough
     */
    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class,
            OrderProduct::class,
            'order_id',
            'product_id'
        );
    }

    /**
     * @return HasMany
     */
    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
