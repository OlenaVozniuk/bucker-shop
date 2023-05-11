<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\StoreRequest;
use App\Services\Cart\Contracts\CartServiceInterface;
use App\Services\Order\Contracts\OrderServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * @var OrderServiceInterface
     */
    private OrderServiceInterface $orderService;

    /**
     * @var CartServiceInterface
     */
    private CartServiceInterface $cartService;

    /**
     * @param OrderServiceInterface $orderService
     * @param CartServiceInterface $cartService
     */
    public function __construct(OrderServiceInterface $orderService, CartServiceInterface $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('checkout.checkout', [
            'products' => $this->cartService->getCart()
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->orderService->store($request->validated());
        $this->cartService->clearAll();
        return redirect()->route('home');
    }
}
