<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\Contracts\LoginServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * @var LoginServiceInterface
     */
    private LoginServiceInterface $service;

    /**
     * @param LoginServiceInterface $service
     */
    public function __construct(LoginServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function processLogin(LoginRequest $request): RedirectResponse
    {
        if($this->service->processLogin($request->validated())) {
            return redirect()->route('admin.categories.index');
        }

        return redirect()->route('login.form')->with('error', 'Invalid credentials');
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $this->service->logout();
        return redirect()->route('login.form');
    }
}
