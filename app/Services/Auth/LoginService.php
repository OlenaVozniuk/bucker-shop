<?php

namespace App\Services\Auth;

use App\Services\Auth\Contracts\LoginServiceInterface;
use Illuminate\Support\Facades\Auth;

class LoginService implements LoginServiceInterface
{
    /**
     * @param array $credentials
     * @return bool
     */
    public function processLogin(array $credentials): bool
    {
       return Auth::attempt($credentials);
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
    }
}
