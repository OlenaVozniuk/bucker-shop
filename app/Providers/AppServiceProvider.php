<?php

namespace App\Providers;

use App\Services\Auth\Contracts\LoginServiceInterface;
use App\Services\Auth\Contracts\RegisterServiceInterface;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Cart\CartService;
use App\Services\Cart\Contracts\CartServiceInterface;
use App\Services\Category\CategoryService;
use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Order\Contracts\OrderServiceInterface;
use App\Services\Order\OrderService;
use App\Services\Product\Contracts\ProductServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Subcategory\Contracts\SubcategoryServiceInterface;
use App\Services\Subcategory\SubcategoryService;
use App\Services\User\Contracts\UserServiceInterface;
use App\Services\User\UserService;
use App\Services\Wishlist\Contracts\WishlistServiceInterface;
use App\Services\Wishlist\WishlistService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(SubcategoryServiceInterface::class, SubcategoryService::class);
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
        $this->app->singleton(LoginServiceInterface::class, LoginService::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(RegisterServiceInterface::class, RegisterService::class);
        $this->app->singleton(CartServiceInterface::class, CartService::class);
        $this->app->singleton(OrderServiceInterface::class, OrderService::class);
        $this->app->singleton(WishlistServiceInterface::class, WishlistService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        View::composer('layout.layout', function (\Illuminate\Contracts\View\View $view){
//            foreach (Session::get('cart')['products'] ?? [] as $product){
//                dd($product['product']->name);
//            }
//            dd(Session::get('cart'));
            $view->with('cart', Session::get('cart'));
        });

    }
}
