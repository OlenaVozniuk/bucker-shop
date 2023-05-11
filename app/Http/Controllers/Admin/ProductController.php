<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\SearchRequest;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Product\Contracts\ProductServiceInterface;
use App\Services\Subcategory\Contracts\SubcategoryServiceInterface;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use function redirect;
use function view;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private ProductServiceInterface $service;

    /**
     * @param ProductServiceInterface $service
     */
    public function __construct(ProductServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param SearchRequest $request
     * @return View
     */
    public function index(SearchRequest $request): View
    {
        return view('admin.products.index', [
            'products'      => $this->service->getAllPaginated($request->validated()),
            'categoriesAll' => resolve(CategoryServiceInterface::class)->getAll()->sortBy('name')->all(),
            'subcategories' => resolve(SubcategoryServiceInterface::class)->getAll(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.products.create', [
            'categoriesAll' => resolve(CategoryServiceInterface::class)->getAll()->all(),
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.products.index')->with('success', 'New product created successfully');
    }

    /**
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('admin.products.show', ['product' => $product]);

    }

    /**
     * @param Product $product
     * @param SubcategoryServiceInterface $subcategoryService
     * @return View
     */
    public function edit(Product $product, SubcategoryServiceInterface $subcategoryService): View
    {
        return view('admin.products.edit', [
            'product'       => $product,
            'subcategories' => $subcategoryService->getAll(),
            'categoriesAll' => resolve(CategoryServiceInterface::class)->getAll()->all(),

        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $this->service->update($product, $request->validated());

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->service->destroy($product);

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
