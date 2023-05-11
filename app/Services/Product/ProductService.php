<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Services\Base\BaseCrudService;
use App\Services\Product\Contracts\ProductServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService extends BaseCrudService implements ProductServiceInterface
{
    /**
     * @return string|Model
     */
    public function getModelClass(): string
    {
        return Product::class;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        /** @var UploadedFile $file */
        $file = $data['image'];

        $fileName = Str::random(10) . '.' . $file->extension();
        $file->storeAs('public/uploads', $fileName);

        $data['image'] = $fileName;

        return parent::store($data);
    }

    /**
     * @param Model|Product $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data): Model
    {
        if ($data['image']) {
            Storage::disk('public')->delete('uploads/' . $model->image);

            /** @var UploadedFile $file */
            $file = $data['image'];

            $fileName = Str::random(10) . '.' . $file->extension();
            $file->storeAs('public/uploads', $fileName);

            $data['image'] = $fileName;
        }

        return parent::update($model, $data);
    }

    /**
     * Delete product
     *
     * @param Model|Product $model
     * @return void
     */
    public function destroy(Model $model): void
    {
        Storage::disk('public')->delete('uploads/' . $model->image);
        parent::destroy($model);
    }

    /**
     * @param array $search
     * @return Builder
     */
    protected function getFilteredQuery(array $search = []): Builder
    {
//        $query = $this->getModelClass()::query();
//
//        if (isset($search['ids'])) {
//            $query->whereIn('id', $search['ids']);
//        }
//
//        return $query;

        return $this->getModelClass()::query()
            ->when(!empty($search['name'] ?? null), function (Builder $query) use ($search) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . Str::lower($search['name']) . '%']);
            })
            ->when(!empty($search['subcategory_id'] ?? null), function (Builder $query) use ($search) {
                $query->where('subcategory_id', $search['subcategory_id']);
            })
            ->when(!empty($search['category_id'] ?? null), function (Builder $query) use ($search) {
                $query
                    ->whereHas('subcategory.category', function (Builder $query) use ($search) {
                        $query->where('id', $search['category_id']);
                    });
            })
            ->when(isset($search['ids']), function (Builder $query) use ($search) {
                $query->whereIn('id', $search['ids']);
            });
    }
}
