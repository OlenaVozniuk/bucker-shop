<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\Contracts\RegisterServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * @var RegisterServiceInterface
     */
    private RegisterServiceInterface $registerService;

    /**
     * @param RegisterServiceInterface $registerService
     */
    public function __construct(RegisterServiceInterface $registerService)
    {
        $this->registerService = $registerService;
    }

    /**
     * @return View
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->registerService->register($request->validated());
        return redirect()->route('admin.categories.index');
    }
}
