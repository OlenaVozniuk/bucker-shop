<?php

namespace App\Services\Subcategory;

use App\Models\Subcategory;
use App\Services\Base\BaseCrudService;
use App\Services\Subcategory\Contracts\SubcategoryServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubcategoryService extends BaseCrudService implements SubcategoryServiceInterface
{
    /**
     * @return string|Model
     */
    public function getModelClass(): string
    {
        return Subcategory::class;
    }

    /**
     * @param array $search
     * @return Builder
     */
    protected function getFilteredQuery(array $search = []): Builder
    {
        return $this->getModelClass()::query()
            ->when(!empty($search['category_id'] ?? null), function (Builder $query) use ($search) {
                $query->where('category_id', $search['category_id']);
            })
            ->when(!empty($search['name'] ?? null), function (Builder $query) use ($search) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . Str::lower($search['name']) . '%']);
            });
    }
}
