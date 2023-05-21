<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $userActive
     * @param User $userToChange
     * @return bool
     */
    public function manage(User $userActive, User $userToChange): bool
    {
        return $userActive->getKey() !== $userToChange->getKey();
    }
}
