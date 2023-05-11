<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Services\Base\BaseCrudService;
use App\Services\Order\Contracts\OrderServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderService extends BaseCrudService implements OrderServiceInterface
{

    /**
     * @return string|Model
     */
    public function getModelClass(): string
    {
        return Order::class;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            /** @var Order $order */
            $order = parent::store($data);
            $cart = Session::get('cart');
            foreach ($cart['products'] as $product) {
                $order->orderProducts()->create([
                    'product_id' => $product['product']->id,
                    'quantity'   => $product['quantity']
                ]);
            }
            return $order;
        });
    }
}
