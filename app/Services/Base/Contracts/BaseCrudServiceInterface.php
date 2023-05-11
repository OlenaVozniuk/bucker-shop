<?php

namespace App\Services\Base\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * interface BaseCrudServiceInterface
 */
interface BaseCrudServiceInterface
{
    /**
     * Get all models with pagination
     *
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(array $search = [], int $pageSize = 15): LengthAwarePaginator;

    /**
     * Get all models
     *
     * @param array $search
     * @return Collection
     */
    public function getAll(array $search = []): Collection;

    /**
     * Create model
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data): Model;

    /**
     * Delete model
     *
     * @param Model $model
     * @return void
     */
    public function destroy(Model $model): void;
}
