<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Cart\Contracts\CartServiceInterface;
use App\Services\Wishlist\Contracts\WishlistServiceInterface;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * @var CartServiceInterface
     */
    private CartServiceInterface $cartService;

    /**
     * @param CartServiceInterface $cartService
     */
    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @return View
     */
    public function cartList(): View
    {
        return view('cart.list', [
            'products' => $this->cartService->getCart()
        ]);
    }

    /**
     * @param WishlistServiceInterface $wishlistService
     * @param Product $product
     * @param int $quantity
     * @return RedirectResponse
     */
    public function addToCart(WishlistServiceInterface $wishlistService, Product $product, int $quantity = 1): RedirectResponse
    {
        $this->cartService->addItem($product, $quantity);
        $wishlistService->removeFromWishlist($product);

        return redirect()->back();
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function remove(Product $product): RedirectResponse
    {
        $this->cartService->remove($product);

        return redirect()->back();

    }

    /**
     * @param Product $products
     * @return RedirectResponse
     */
    public function clearAll(): RedirectResponse
    {
        $this->cartService->clearAll();

        return redirect()->back();
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Product $product, int $quantity): RedirectResponse
    {
        abort_if($quantity <= 0, 400);
        $this->cartService->update($product, $quantity);

        return redirect()->back();
    }
}
