<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property bool $is_active
 * @property bool $is_admin
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['created_at', 'updated_at', 'name', 'email', 'password', 'is_active', 'is_admin'];

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'order_id');
    }
}
