<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\Base\BaseCrudService;
use App\Services\User\Contracts\UserServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService extends BaseCrudService implements UserServiceInterface
{

    /**
     * @return string|Model
     */
    public function getModelClass(): string
    {
        return User::class;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        $data['password'] = Hash::make($data['password']);
        return parent::store($data);
    }

    /**
     * @param array $search
     * @return Builder
     */
    public function getFilteredQuery(array $search = []): Builder
    {
        return $this->getModelClass()::query()
            ->when(!empty($search['search'] ?? null), function (Builder $query) use ($search) {
                $query->whereRaw('LOWER(email) LIKE ?', ['%' . Str::lower($search['search']) . '%'])
                ->orWhereRaw('LOWER(name) LIKE ?', ['%' . Str::lower($search['search']) . '%']);
            });
    }
}
