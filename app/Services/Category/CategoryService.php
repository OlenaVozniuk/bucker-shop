<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\Base\BaseCrudService;
use App\Services\Category\Contracts\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryService extends BaseCrudService implements CategoryServiceInterface
{
    /**
     * @return string|Model
     */
    public function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * @param array $search
     * @return Builder
     */
    protected function getFilteredQuery(array $search = []): Builder
    {
        return $this->getModelClass()::query()
            ->when(!empty($search['name'] ?? null), function (Builder $query) use ($search) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . Str::lower($search['name']) . '%']);
            });
    }
}
