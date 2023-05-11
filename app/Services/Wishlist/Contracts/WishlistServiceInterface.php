<?php

namespace App\Services\Wishlist\Contracts;

use App\Models\Product;

interface WishlistServiceInterface
{
    /**
     * @return array
     */
    public function getWishlist(): array;

    /**
     * @param Product $product
     * @return void
     */
    public function addItemToWishlist(Product $product): void;

    /**
     * @param Product $product
     * @return void
     */
    public function removeFromWishlist(Product $product): void;
}
