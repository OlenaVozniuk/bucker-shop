<?php

namespace App\Services\Wishlist;

use App\Models\Product;
use App\Services\Wishlist\Contracts\WishlistServiceInterface;
use Illuminate\Support\Facades\Session;

class WishlistService implements WishlistServiceInterface
{
    /**
     * @return array
     */
    public function getWishlist(): array
    {
        return Session::get('wishlist', []);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function addItemToWishlist(Product $product): void
    {
        $wishlist = $this->getWishlist();
        $wishlist[] = $product->getKey();
        Session::put('wishlist', array_unique($wishlist));
    }

    /**
     * @param Product $product
     * @return void
     */
    public function removeFromWishlist(Product $product): void
    {
        $wishlist = $this->getWishlist();
        if (($key = array_search($product->getKey(), $wishlist)) !== false) {
            unset($wishlist[$key]);
        }

        Session::put('wishlist', $wishlist);
//
//        $wishlist = $this->getWishlist();
//
//        foreach ($wishlist as $key => $value)
//        {
//            if($value === $product->getKey()){
//                unset($wishlist[$key]);
//                break;
//            }
//        }
//        Session::put('wishlist', $wishlist);
    }
}
