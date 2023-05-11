<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\SearchRequest;
use App\Models\Product;
use App\Services\Cart\Contracts\CartServiceInterface;
use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Product\Contracts\ProductServiceInterface;
use App\Services\Subcategory\Contracts\SubcategoryServiceInterface;
use App\Services\Wishlist\Contracts\WishlistServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class  ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private ProductServiceInterface $service;

    /**
     * @param ProductServiceInterface $service
     */
    public function __construct(ProductServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param SearchRequest $request
     * @param WishlistServiceInterface $wishlistService
     * @param CartServiceInterface $cartService
     * @return View
     */
    public function index(SearchRequest $request, WishlistServiceInterface $wishlistService, CartServiceInterface $cartService): View
    {
        return view('products.index', [
            'products'      => $this->service->getAllPaginated($request->validated()),
            'categories'    => resolve(CategoryServiceInterface::class)->getAll(),
            'subcategories' => resolve(SubcategoryServiceInterface::class)->getAll(),
            'wishlist'      => $wishlistService->getWishlist(),
            'cart'          => $cartService->getCart(),
        ]);
    }

    /**
     * @param Product $product
     * @param WishlistServiceInterface $wishlistService
     * @param CartServiceInterface $cartService
     * @return View
     */
    public function show(Product $product, WishlistServiceInterface $wishlistService, CartServiceInterface $cartService): View
    {
        return view('products.show', [
            'product'    => $product,
            'categories' => resolve(CategoryServiceInterface::class)->getAll(),
            'wishlist'   => $wishlistService->getWishlist(),
            'cart'       => $cartService->getCart(),
        ]);
    }
}
