<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Cart\Contracts\CartServiceInterface;
use App\Services\Product\Contracts\ProductServiceInterface;
use App\Services\Wishlist\Contracts\WishlistServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WishlistController extends Controller
{
    /**
     * @var WishlistServiceInterface
     */
    private WishlistServiceInterface $wishlistService;

    /**
     * @param WishlistServiceInterface $wishlistService
     */
    public function __construct(WishlistServiceInterface $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    public function index(ProductServiceInterface $productService, CartServiceInterface $cartService): View
    {
        return view('wishlist.wishlist', [
            'products' => $productService->getAllPaginated(['ids' => $this->wishlistService->getWishlist()]),
            'cart'     => $cartService->getCart(),
        ]);
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function addItemToWishlist(Product $product): RedirectResponse
    {
        $this->wishlistService->addItemToWishlist($product);

        return redirect()->back();
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function removeFromWishlist(Product $product): RedirectResponse
    {
        $this->wishlistService->removeFromWishlist($product);

        return redirect()->back();
    }
}
