<?php

namespace App\Services\Base;

use App\Services\Base\Contracts\BaseCrudServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseCrudService implements BaseCrudServiceInterface
{
    /**
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(array $search = [], int $pageSize = 15): LengthAwarePaginator
    {
        return $this->getFilteredQuery($search)->paginate($pageSize);
    }

    /**
     * @param array $search
     * @return Collection
     */
    public function getAll(array $search = []): Collection
    {
        return $this->getFilteredQuery($search)->get();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->getModelClass()::query()->create($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $model->refresh();
    }

    /**
     * @param Model $model
     * @return void
     */
    public function destroy(Model $model): void
    {
        $model->delete();
    }

    /**
     * @return string|Model
     */
    abstract public function getModelClass(): string;

    /**
     *
     *
     * @param array $search
     * @return Builder
     */
    protected function getFilteredQuery(array $search = []): Builder
    {
        return $this->getModelClass()::query();
    }
}
