<?php

namespace App\Services\Auth\Contracts;

use Illuminate\Database\Eloquent\Model;

interface LoginServiceInterface
{
    /**
     * @param array $credentials
     * @return bool
     */
    public function processLogin(array $credentials): bool;

    /**
     * @param Model $model
     * @return void
     */
    public function logout(): void;
}
