<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $name
 * @property string $image
 * @property integer $price
 * @property string $model
 * @property integer $subcategory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Subcategory $subcategory
 * @mixin Builder
 */
class Product extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
