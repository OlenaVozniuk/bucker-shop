<?php

namespace App\Services\Cart\Contracts;

use App\Models\Product;

interface CartServiceInterface
{
    /**
     * @return array
     */
    public function getCart(): array;

    /**
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function addItem(Product $product, int $quantity = 1): void;

    /**
     * @param Product $product
     * @return void
     */
    public function remove(Product $product): void;

    /**
     * @return void
     */
    public function clearAll(): void;

    /**
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function update(Product $product, int $quantity): void;
}
