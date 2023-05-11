<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\SearchRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Product\Contracts\ProductServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use function redirect;
use function view;

class CategoryController extends Controller
{
    /**
     * @var CategoryServiceInterface
     */
    private CategoryServiceInterface $service;

    /**
     * @param CategoryServiceInterface $service
     */
    public function __construct(CategoryServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param SearchRequest $request
     * @return View
     */
    public function index(SearchRequest $request): View
    {
        return view('admin.categories.index', [
            'categories' => $this->service->getAllPaginated($request->validated())
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        /** @var Category $category */
        $category = $this->service->store($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Category ' . $category->name . ' created successfully.');
    }

    /**
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * @param UpdateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $this->service->update($category, $request->validated());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->service->destroy($category);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category ' . $category->name . ' deleted successfully');
    }

    /**
     * @param Category $category
     * @return View
     */
    public function showSubcategories(Category $category): View
    {
        return view('admin.categories.subcategories', [
            'subcategories' => $category->subcategories
        ]);
    }

    /**
     * @param Category $category
     * @return View
     */
    public function showProducts(Category $category): View
    {
//        dd($category->products()->paginate(10));
        return view('admin.categories.products', [
            'products' => resolve(ProductServiceInterface::class)->getAllPaginated([
                'category_id' => $category->getKey()
            ])
        ]);
    }
}
