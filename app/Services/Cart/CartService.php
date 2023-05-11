<?php

namespace App\Services\Cart;

use App\Models\Product;
use App\Services\Cart\Contracts\CartServiceInterface;
use Exception;
use Illuminate\Support\Facades\Session;

class CartService implements CartServiceInterface
{
    /**
     * @return array
     */
    public function getCart(): array
    {
        return Session::get('cart', []);
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function addItem(Product $product, int $quantity = 1): void
    {
        $cart = $this->getCart();
        $cart['products'][$product->getKey()] = [
            'product'  => $product,
            'quantity' => $quantity,
        ];
        $cart['product_ids'][] = $product->getKey();
        $cart['product_ids'] = array_unique($cart['product_ids']);
        Session::put('cart', ($this->recalculation($cart)));
    }

    /**
     * @param Product $product
     * @return void
     */
    public function remove(Product $product): void
    {
        $cart = $this->getCart();
        unset($cart['products'][$product->getKey()]);
        if (($key = array_search($product->getKey(), $cart['product_ids'])) !== false) {
            unset($cart['product_ids'][$key]);
        }
        Session::put('cart', $this->recalculation($cart));
    }

    /**
     * @return void
     */
    public function clearAll(): void
    {
        Session::put('cart', [
            'products'      => [],
            'totalPrice'    => 0,
            'totalQuantity' => 0
        ]);
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return void
     * @throws Exception
     */
    public function update(Product $product, int $quantity): void
    {
        $cart = $this->getCart();

        if (!isset($cart['products'][$product->getKey()])) {
            throw new Exception('Product not found');
        }

        $cart['products'][$product->getKey()]['quantity'] = $quantity;
        Session::put('cart', $this->recalculation($cart));
    }

    /**
     * @param array $cart
     * @return array
     */
    private function recalculation(array $cart): array
    {
        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($cart['products'] as $product) {
            $totalQuantity += $product['quantity'];
            $totalPrice += $product['quantity'] * $product['product']->price;
        }
        $cart['totalPrice'] = $totalPrice;
        $cart['totalQuantity'] = $totalQuantity;
        return $cart;
    }


//    protected $arr = [
//      'products' =>[
//          'product_id' =>  [
//              'product' => $product,
//              'quantity' => 2
//          ]
//      ],
//      'totalPrice' => $totalPrice,
//      'totalQuantity' => $totalQuantity
//    ];

}
