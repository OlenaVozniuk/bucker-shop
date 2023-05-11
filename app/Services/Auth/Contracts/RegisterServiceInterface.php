<?php

namespace App\Services\Auth\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RegisterServiceInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function register(array $data): Model;

}
